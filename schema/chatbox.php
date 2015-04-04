<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Builder;

return [
    "schema" => [
        "cb_room" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->string("srug");
                $table->text("data");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
        "cb_room_tag" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->unsignedInteger("room_id");
                $table->string("type");
                $table->string("value");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
        "cb_tenants" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->unsignedInteger("room_id");
                $table->unsignedInteger("user_id");
                $table->boolean("is_kicked");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
        "cb_message" => function(Blueprint $table){
                $table->unsignedInteger("id",true);
                $table->unsignedInteger("room_id");
                $table->unsignedInteger("user_id");
                $table->string("type");
                $table->text("message");
                $table->dateTime("created_at");
                $table->dateTime("updated_at");
            },
    ],
    "seeds" => [
        ["master_user",function(Builder $builder){
            $builder->insert([
                "name"=>"Tom",
                "sex" => "1"
            ]);
        }],
    ],
    "include" => [
        "user" => __DIR__."/data/user.php"
    ]
];