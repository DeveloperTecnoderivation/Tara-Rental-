<?php
class Curl {

    private $ch;

    public function __construct() {
        $this->ch = curl_init();
    }

    // Set the URL for the request
    public function set_url($url) {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);  // Get the response as a string
    }

    // Set headers for the request
    public function set_headers($headers) {
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);
    }

    // Add POST fields
    public function set_post_fields($data) {
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }

    // Execute the cURL request
    public function execute() {
        return curl_exec($this->ch);
    }

    // Close the cURL session
    public function close() {
        curl_close($this->ch);
    }

    // Get the last error
    public function error() {
        return curl_error($this->ch);
    }
}