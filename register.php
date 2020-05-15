<?php

$REGISTER_LTI2 = array(
    "name" => "Randomly", // Name of the tool
    "FontAwesome" => "fa-random", // Icon for the tool
    "short_name" => "Randomly",
    "description" => "Randomly pick a student from your roster, split them into groups, or put them in a random order.", // Tool description
    "messages" => array("launch"),
    "privacy_level" => "public",  // anonymous, name_only, public
    "license" => "Apache",
    "languages" => array(
        "English",
    ),
    "source_url" => "https://github.com/udaytonapps/randomly",
    // For now Tsugi tools delegate this to /lti/store
    "placements" => array(
        /*
        "course_navigation", "homework_submission",
        "course_home_submission", "editor_button",
        "link_selection", "migration_selection", "resource_selection",
        "tool_configuration", "user_navigation"
        */
    ),
    "screen_shots" => array(
    )
);
