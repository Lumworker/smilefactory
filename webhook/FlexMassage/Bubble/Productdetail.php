<?php
$jsonflex=
[
  "type"=> "flex",
  "altText"=> "Flex Message",
  "contents"=> [
    "type"=> "bubble",
    "hero"=> [
      "type"=> "image",
      "url"=> $row["img"],
      "size"=> "full",
      "aspectRatio"=> "1:1",
      "aspectMode"=> "cover",
      "backgroundColor"=> "#FFFFFF"
    ],
    "body"=> [
      "type"=> "box",
      "layout"=> "horizontal",
      "spacing"=> "md",
      "contents"=> [
        [
          "type"=> "box",
          "layout"=> "vertical",
          "flex"=> 1,
          "contents"=> [
            [
              "type"=> "image",
              "url"=> "https://www.img.in.th/images/53c832d48b8cd4120c9579334282fb39.jpg",
              "gravity"=> "bottom",
              "size"=> "sm",
              "aspectRatio"=> "1:1",
              "aspectMode"=> "cover"
            ]
          ]
        ],
        [
          "type"=> "box",
          "layout"=> "vertical",
          "flex"=> 2,
          "contents"=> [
            [
              "type"=> "text",
              "text"=> $row["name"],
              "flex"=> 0,
              "size"=> "lg",
              "gravity"=> "top",
              "weight"=> "regular",
              "color"=> "#000000",
              "wrap"=> true
            ],
            [
              "type"=> "separator"
            ],
            [
              "type"=> "text",
              "text"=> $row["description"],
              "margin"=> "xs",
              "size"=> "xs",
              "color"=> "#707070",
              "wrap"=> true
            ]
          ]
        ]
      ]
    ],
    "footer"=> [
      "type"=> "box",
      "layout"=> "horizontal",
      "contents"=> [
        [
          "type"=> "button",
          "action"=> [
            "type"=> "message",
            "label"=> "Detail",
            "text"=> "รายละเอียดสินค้า : $message[1]"
          ],
          "color"=> "#FF3F00",
          "style"=> "primary"
        ]
      ]
    ]
  ]
]
?>