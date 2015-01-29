<?php
/**
 * Created by PhpStorm.
 * User: taro
 * Date: 2015/01/29
 * Time: 12:32
 * @version 1.00
 */
class ZATUDAN
{

    private $response;

    /**
     * @param String$APIKEY         DocomoのAPIキー
     * @param String $QUESTIONTEXT  質問本体
     */
    function __construct($APIKEY,$QUESTIONTEXT)
    {
        getdate(trim($APIKEY),trim($QUESTIONTEXT));
    }

    /**
     * @param $APIKEY
     * @param $QUESTIONTEXT
     *
     * @var $_APIKEY string APILEYを入れる変数
     */
    public function getData($APIKEY,$QUESTIONTEXT)
    {
        $_APIKEY = $APIKEY;
        $_QUESTIONTEXT = $QUESTIONTEXT;
        $url = 'https://api.apigw.smt.docomo.ne.jp/knowledgeQA/v1/ask';
        $data = http_build_query(
            array(
                'p' => $_QUESTIONTEXT,
                'apikey' => $_APIKEY
            )
        );
        $header = Array(
            "Content-Type: application/json",
            "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
        );
        $options = array('http' =>
            array(
                'method' => 'GET',
                'header'  => implode("\r\n", $header),
            )
        );
        $contents = file_get_contents($url . '?' . $data, false, stream_context_create($options));
    }
}