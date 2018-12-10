<?php

namespace controller;


class ImageUploaderController extends Controller {

    function actionIndex() {
        if (isset($_FILES["upload"])) {
            if ($_FILES["upload"]["error"] === 0) {
                $file_types = [
                    "image/png" => '.png',
                    "image/jpeg" => '.jpg',
                ];
                $file_type = $_FILES["upload"]['type'];
                if (isset($file_types[$file_type])) {
                    $file_name = uniqid() . $file_types[$file_type];
                    move_uploaded_file(
                        $_FILES["upload"]["tmp_name"],
                        "assets/uploads/" . $file_name);
                    exit(json_encode([
                        'uploaded' => true,
                        "url" => SITE_URL . '/assets/uploads/' . $file_name
                    ]));
                }
            }
        }
        exit(json_encode([
            'uploaded' => false,
            "error" => [
                "message" => "could not upload this image"
            ]
        ]));
    }
}