<?php
return [
    "MediaTypeServices" => [
        "image" => [
            "extensions" => [
                "png", "jpg", "jpeg", "svg"
            ],
            "handler" => \App\Services\ImageFileService::class
        ],
        "video" => [
            "extensions" => [
                "mp4", "avi"
            ],
            "handler" => \App\Services\VideoFileService::class
        ],
        "zip" => [
            "extensions" => [
                "rar", "zip"
            ],
            "handler" => \App\Services\ZipFileService::class
        ]
    ]
];
