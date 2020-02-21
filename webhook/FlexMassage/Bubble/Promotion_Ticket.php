<?php
$jsonflex=
[
  "type"=>"flex",
  "altText"=>"Flex Message",
  "contents"=>[
    "type"=>"bubble",
    "hero"=>[
      "type"=>"image",
      "url"=>$img ,
      "size"=>"full",
      "aspectMode"=>"cover"
    ],
    "footer"=>[
      "type"=>"box",
      "layout"=>"vertical",
      "spacing"=>"sm",
      "contents"=>[
        [
          "type"=>"box",
          "layout"=>"vertical",
          "contents"=>[
            [
              "type"=>"spacer"
            ],
            [
              "type"=>"box",
              "layout"=>"horizontal",
              "contents"=>[
                [
                  "type"=>"image",
                  "url"=>$arrayDB[$i][2],
                  "align"=>"start",
                  "size"=>"md",
                  "aspectRatio"=>"1:1",
                  "aspectMode"=>"fit"
                ],
                [
                  "type"=>"box",
                  "layout"=>"vertical",
                  "flex"=>2,
                  "margin"=>"md",
                  "contents"=>[
                    [
                      "type"=>"text",
                      "text"=>"โปรโมชั่นลับ !!",
                      "margin"=>"xs",
                      "size"=>"sm",
                      "align"=>"start",
                      "color"=>"#FF6262",
                      "wrap"=>true
                    ],
                    [
                      "type"=>"text",
                      "text"=>$ticket_name,
                      "margin"=>"xs",
                      "size"=>"sm",
                      "align"=>"start",
                      "weight"=>"regular",
                      "wrap"=>true
                    ],
                    [
                      "type"=>"text",
                      "text"=>$description,
                      "margin"=>"xs",
                      "size"=>"xxs",
                      "align"=>"start",
                      "weight"=>"regular",
                      "wrap"=>true
                    ],
                    [
                      "type"=>"text",
                      "text"=>"*เฉพาะ",
                      "size"=>"sm"
                    ],
                    [
                      "type"=>"text",
                      "text"=>" คุณ ".$arrayDB[$i][0],
                      "size"=>"md",
                      "align"=>"end",
                      "weight"=>"bold"
                    ],
                    [
                      "type"=>"separator"
                    ],
                    [
                      "type"=>"filler"
                    ]
                  ]
                ]
              ]
            ]
          ]
        ],
        [
          "type"=>"button",
          "action"=>[
            "type"=>"message",
            "label"=>"รับ สิทธิ์ ฟรี!!",
            "text"=>"ยืนยันสิทธิ์ : $ticket_id "
          ],
          "color"=>"#F64A32",
          "height"=>"sm",
          "style"=>"primary"
        ]
      ]
    ]
  ]
]

?>