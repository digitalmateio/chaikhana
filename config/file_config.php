<?php

// file_thumb_sizes are used to get list of sizes to crop thubnails 
// the 200 200 key is used to display items in gallery so dont remove them they must be here
// u can add a new key for new size if u want 

    return [
        'file_master_directory_name' => 'files',
        'static_server_path' => 'http://chaikhana.io/files',
        'file_thumb_sizes' => [
            [                       // DONT REMOVE THIS SHIT THIS THUMB SIZE IS USED TO DISPLAY IMAGES IN GALLERY
                'width' =>128,
                'height' => 128,
            ],
            [
                'width' => 200,
                'height' => 200,
            ],
            [
                'width' => 300,
                'height' => 300,
            ],
            [
                'width' => 500,
                'height' => 500,
            ],
            [
                'width' => 840,
                'height' => 560,
            ],
            // chaikhana site image sizes
            
            [
            'width' => 274	
            'height' => 189
            ],

            [            
            'width' => 300
            'height' => 202
            ],

            [           
            'width' => 1640
            'height' => 662
            ],

            [            
            'width' => 413
            'height' => 320
            ],

            [           
            'width' => 263
            'height' => 166
            ],

            [            
            'width' => 536
            'height' => 360
            ],

            [            
            'width' => 220
            'height' => 228
            ],

            [            
            'width' => 515
            'height' => 373
            ],

            [           
            'width' => 950
            'height' => 858
            ],

            [           
            'width' => 488
            'height' => 354
            ],

            [           
            'width' => 769
            'height' => 867
            ],

            [          
            'width' => 398
            'height' => 269
            ],        
            [
            'width' => 1920
            'height' => 1125
            ],
            [
            'width' => 1920
            'height' => 848
            ]          

        ],
        
        'file_production_thumb_sizes' => [
            [
                'width' => 840,
                'height' => 560,
            ],
            [
                'width' => 1920,
                'height' => 1080,
            ],
            [
                'width' => 1366,
                'height' => 768,
            ],
            [
                'width' => 900,
                'height' => 900,
            ],
            [
                'width' => 500,
                'height' => 500,
            ],
                  [
                'width' => 300,
                'height' => 300,
            ]
        ],
        
        'chaikhana_production_thumb_size' =>  [

                [
                'width' => 1920,
                'height' => 1140,
                ],

                [
                'width' => 398,
                'height' => 369,
                ],

                [
                'width' => 790,
                'height' => 369,
                ],

                [
                'width' => 536,
                'height' => 360,
                ]
        ],
        
        'file_types' => [
            'audio' => 1,
            'video' => 2,
            'image' => 3,
            'other' => 4,
        ],

        'valid_files' => [
            'gif',
            'pdf',
            'jpg',
            'jpeg',
            'mpeg',
            'mp4',
            'm4v',
            'mov',
            'mp3',
            'flac',
            'wma',
            'wav',
            'PNG',
            'png'
        ]
    ];

/*
   [
                'width' => 1920,
                'height' => 1140,
                ],

                [
                'width' => 398,
                'height' => 369,
                ],

                [
                'width' => 790,
                'height' => 369,
                ],

                [
                'width' => 536,
                'height' => 360,
                ],
                [
                'width' => 1920,
                'height' => 892,
                ],
                [
                'width' => 398,
                'height' => 269,
                ],
                [
                'width' => 789,
                'height' => 785,
                ],
                [
                'width' => 220,
                'height' => 228,
                ],
                [
                'width' => 300,
                'height' => 202,
                ],
                [
                'width' => 274,
                'height' => 189,
                ],
                [
                'width' => 536,
                'height' => 360,
                ],
                [
                'width' => 1640,
                'height' => 612,
                ],
                [
                'width' => 400,
                'height' => 269,
                ],
                [
                'width' => 1920,
                'height' => 848,
                ],
                [
                'width' => 1920,
                'height' => 1125,
                ],
                [
                'width' => 1362,
                'height' => 744,
                ],
                [
                'width' => 674,
                'height' => 371,
                ],
                [
                'width' => 950,
                'height' => 1000,
                ],
                [
                'width' => 1640,
                'height' => 441,
                ],
                [
                'width' => 551,
                'height' => 682,
                ],
                [
                'width' => 278,
                'height' => 344,
                ],
                [
                'width' => 950,
                'height' => 858,
                ],
                [
                'width' => 488,
                'height' => 354,
                ],
                [
                'width' => 100,
                'height' => 100,
                ],
                [
                'width' => 413,
                'height' => 320,
                ],
                [
                'width' => 769,
                'height' => 867,
                ],
                [
                'width' => 515,
                'height' => 373,
                ],
                [
                'width' => 1640,
                'height' => 662,
                ],
                [
                'width' => 263,
                'height' => 166,
                ]
*/
