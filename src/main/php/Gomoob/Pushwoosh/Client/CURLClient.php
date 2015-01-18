<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Client;

use Gomoob\Pushwoosh\ICURLClient;

/**
 * Class which defines a CURL client.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class CURLClient implements ICURLClient
{
    /**
     * {@inheritDoc}
     */
    public function pushwooshCall($method, array $data)
    {
        $url = 'https://cp.pushwoosh.com/json/1.3/' . $method;
        $request = json_encode(array('request' => $data));

        $ch = curl_init($url);

        // FIXME: FIX THIS !!!
        // see: http://curl.haxx.se/docs/sslcerts.html
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request)
            )
        );

        $response = curl_exec($ch);
        $error = curl_error($ch);

        if ($error) {
            $info = curl_getinfo($ch);

            // FIXME
            var_dump($error);
            var_dump($info);

        }

        curl_close($ch);

        return json_decode($response, true);

    }
}
