<?php
header('Content-type: application/json');
$git_events = [
    'ping',
    'push'
];

try {
    // check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // validate the server headers
        $header = get_git_headers();
        if (isset($_SERVER) && !empty($header)) {
            // loop through the server headers and validate if the headers are correct
            foreach (["X-Github-Event", 'X-Github-Delivery', 'X-Hub-Signature'] as $header_key) {
                if (!in_array($header_key, array_keys($header))) {
                    throw new Exception('Request do not have the required GITHUB header keys');
                }
            }
            // check if the git event is in the allowed list
            foreach ($git_events as $event) {
                if ($header['X-Github-Event'] == $event) {
                    // get post payload
                    $payload = file_get_contents('php://input');
                    if ($payload && strlen($payload)) {
                        // convert to a json object
                        $payload = json_encode($payload);
                        call_user_func('git_event_' . $event, $header, $payload);
                    } else {
                        // else throw error
                        throw new Exception('POST payload missing or corrupted');
                    }
                    break;
                }
            }
            // else throw error
            throw new Exception('GIT event is not supported or not defined in configuration');
        }
    }
} catch (Exception $e) {
    echo json_encode([
        'status' => false,
        'message' => $e->getMessage(),
        '_time' => time()
    ]);
    exit();
}

// GIT events

function git_event_push($header, $payload)
{
    if ($header && $payload) {
        // The commands
        $commands = array(
            '/usr/bin/git pull',
            '/usr/bin/git status'
        );
        $output = '';
        foreach ($commands AS $command) {
            $output .= $command . ': ' . exec($command) . ' / ';
        }
        echo json_encode([
            'status' => true,
            'message' => $output,
            '_time' => time()
        ]);
        exit();
    }
    // else throw error
    throw new Exception('Required parameters for the event PUSH function is missing.');
}


function git_event_ping($header, $payload)
{
    if ($header && $payload) {
        // The commands
        $commands = array(
            '/usr/bin/git pull',
            '/usr/bin/git status'
        );
        $output = '';
        foreach ($commands AS $command) {
            $output .= $command . ': ' . exec($command) . ' / ';
        }
        echo json_encode([
            'status' => true,
            'message' => $output,
            '_time' => time()
        ]);
        exit();
    }
    // else throw error
    throw new Exception('Required parameters for the event PING function is missing.');
}

function get_git_headers()
{
    if (!is_array($_SERVER)) {
        return array();
    }

    $headers = array();
    foreach ($_SERVER as $name => $value) {
        if (substr($name, 0, 5) == 'HTTP_') {
            $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
        }
    }
    return $headers;
}


print json_encode([
    'status' => 'false',
    'message' => 'Hello. You accessed a GIT deployment file and this cannot be viewed in your browser, Please navigate back to Brussleslife.be'
]);


