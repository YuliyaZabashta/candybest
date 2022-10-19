<?php
namespace app\models;

class Service extends AppModel{
    
    public $attributes = [
        'name'=>'',
        'telephone'=>'',
        'note'=>'',
    ];

    public $rules = [
        'required'=>[
            ['name'],
            ['telephone'],
        ],
        'lengthMin'=>[
            ['telephone', 12],
        ]
    ];
}