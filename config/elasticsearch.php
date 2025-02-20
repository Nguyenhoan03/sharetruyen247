<?php

return [
    'hosts' => [
        [
            'host' => env('ELASTICSEARCH_HOST', 'localhost'),
            'port' => env('ELASTICSEARCH_PORT', 9200),
            'scheme' => 'http',
        ]
    ],
    
    'indices' => [
        'stories' => [
            'settings' => [
                'number_of_shards' => 1,
                'number_of_replicas' => 0
            ],
            'mappings' => [
                'properties' => [
                    'title' => [
                        'type' => 'text',
                        'analyzer' => 'standard'
                    ],
                    'content' => [
                        'type' => 'text',
                        'analyzer' => 'standard'
                    ],
                    'image' => [
                        'type' => 'keyword'
                    ],
                    'theloai' => [
                        'type' => 'keyword'
                    ],
                    'chapter' => [
                        'type' => 'keyword'
                    ]
                ]
            ]
        ]
    ]
]; 