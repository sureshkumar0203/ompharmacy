<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PillReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pill:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = \App\PillManagement::with(['user_det' => function($query){
            $query->select('id','first_name','last_name', 'phone', 'email');
        }])->get();
        $serverTime = date('H:i');
        $serverDate = date('Y-m-d');

        foreach ($data as $key => $value) {
            $timeExp = explode(':', $value->time);
            $time_ = $timeExp[0].':'.$timeExp[1];
            if($serverDate >= $value->start_date){
                if($value->status < $value->days && $time_ == $serverTime){
                    sendSms($value->user_det->phone, 'Dear '.$value->user_det->first_name.' '.$value->user_det->last_name.' You take this '.$value->medicine.' medicine @ '. date("g:i A", strtotime($value->time)));
                    $uStatus = $value->status+1;
                    \App\PillManagement::where('id', $value->id)->update(['status' => $uStatus]);
                }
            }
        }
    }
}
