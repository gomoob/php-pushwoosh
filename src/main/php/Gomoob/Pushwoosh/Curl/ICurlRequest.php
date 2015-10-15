<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2015, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Curl;

/**
 * Interface used to abstract the CURL PHP methods.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 * @see http://php.net/manual/book.curl.php
 */
interface ICurlRequest
{
    /**
     * Set an option for a cURL transfer.
     *
     * @param int option The CURLOPT_ option to set.
     * @param mixed $value The value to be set on option.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    public function setOpt($option, $value);

    /**
     * Return a string containing the last error for the current session.
     *
     * @return string Returns a clear text error message for the last cURL operation.
     */
    public function error();
    
    /**
     * Perform a cURL session.
     *
     * @return mixed Returns TRUE on success or FALSE on failure. However, if the CURLOPT_RETURNTRANSFER option is set,
     *         it will return the result on success, FALSE on failure.
     */
    public function exec();

    /**
     * Get information regarding a specific transfer.
     *
     * @param int $opt This may be one of the following constants:
     *        * CURLINFO_EFFECTIVE_URL           - Last effective URL
     *        * CURLINFO_HTTP_CODE               - Last received HTTP code
     *        * CURLINFO_FILETIME                - Remote time of the retrieved document, if -1 is returned the time of
     *                                             the document is unknown
     *        * CURLINFO_TOTAL_TIME              - Total transaction time in seconds for last transfer
     *        * CURLINFO_NAMELOOKUP_TIME         - Time in seconds until name resolving was complete
     *        * CURLINFO_CONNECT_TIME            - Time in seconds it took to establish the connection
     *        * CURLINFO_PRETRANSFER_TIME        - Time in seconds from start until just before file transfer begins
     *        * CURLINFO_STARTTRANSFER_TIME      - Time in seconds until the first byte is about to be transferred
     *        * CURLINFO_REDIRECT_COUNT          - Number of redirects, with the CURLOPT_FOLLOWLOCATION option enabled
     *        * CURLINFO_REDIRECT_TIME           - Time in seconds of all redirection steps before final transaction was
     *                                             started, with the CURLOPT_FOLLOWLOCATION option enabled
     *        * CURLINFO_REDIRECT_URL            - With the CURLOPT_FOLLOWLOCATION option disabled: redirect URL found
     *                                             in the last transaction, that should be requested manually next. With
     *                                             the CURLOPT_FOLLOWLOCATION option enabled: this is empty. The
     *                                             redirect URL in this case is available in CURLINFO_EFFECTIVE_URL
     *        * CURLINFO_PRIMARY_IP              - IP address of the most recent connection
     *        * CURLINFO_PRIMARY_PORT            - Destination port of the most recent connection
     *        * CURLINFO_LOCAL_IP                - Local (source) IP address of the most recent connection
     *        * CURLINFO_LOCAL_PORT              - Local (source) port of the most recent connection
     *        * CURLINFO_SIZE_UPLOAD             - Total number of bytes uploaded
     *        * CURLINFO_SIZE_DOWNLOAD           - Total number of bytes downloaded
     *        * CURLINFO_SPEED_DOWNLOAD          - Average download speed
     *        * CURLINFO_SPEED_UPLOAD            - Average upload speed
     *        * CURLINFO_HEADER_SIZE             - Total size of all headers received
     *        * CURLINFO_HEADER_OUT              - The request string sent. For this to work, add the
     *                                             CURLINFO_HEADER_OUT option to the handle by calling curl_setopt()
     *        * CURLINFO_REQUEST_SIZE            - Total size of issued requests, currently only for HTTP requests
     *        * CURLINFO_SSL_VERIFYRESULT        - Result of SSL certification verification requested by setting
     *                                             CURLOPT_SSL_VERIFYPEER
     *        * CURLINFO_CONTENT_LENGTH_DOWNLOAD - content-length of download, read from Content-Length: field
     *        * CURLINFO_CONTENT_LENGTH_UPLOAD   - Specified size of upload
     *        * CURLINFO_CONTENT_TYPE            - Content-Type: of the requested document, NULL indicates server did
     *                                             not send valid Content-Type: header
     *        * CURLINFO_PRIVATE                 - Private data associated with this cURL handle, previously set with
     *                                             the CURLOPT_PRIVATE option of curl_setopt()
     *
     * @return mixed If opt is given, returns its value. Otherwise, returns an associative array with the following
     *         elements (which correspond to opt), or FALSE on failure:
     *          * "url"
     *          * "content_type"
     *          * "http_code"
     *          * "header_size"
     *          * "request_size"
     *          * "filetime"
     *          * "ssl_verify_result"
     *          * "redirect_count"
     *          * "total_time"
     *          * "namelookup_time"
     *          * "connect_time"
     *          * "pretransfer_time"
     *          * "size_upload"
     *          * "size_download"
     *          * "speed_download"
     *          * "speed_upload"
     *          * "download_content_length"
     *          * "upload_content_length"
     *          * "starttransfer_time"
     *          * "redirect_time"
     *          * "certinfo"
     *          * "primary_ip"
     *          * "primary_port"
     *          * "local_ip"
     *          * "local_port"
     *          * "redirect_url"
     *          * "request_header" (This is only set if the CURLINFO_HEADER_OUT is set by a previous call to
     *            curl_setopt())
     *
     *         Note that private data is not included in the associative array and must be retrieved individually with
     *         the CURLINFO_PRIVATE option.
     */
    public function getInfo($opt = 0);

    /**
     * Close a cURL session.
     */
    public function close();
}
