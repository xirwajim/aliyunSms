<?php
/**
 * Created by IntelliJ IDEA.
 * User: xirwajim
 * Date: 2016/10/19
 * Time: 11:14
 */

namespace Arnale\AliyunSms;


use Aliyun\Core\DefaultAcsClient;
use Aliyun\Core\Profile\DefaultProfile;
use Arnale\AliyunSms\Request\V20160927\SingleSendSmsRequest;

class AliyunSms
{

    private $config;

    /**
     * Application constructor.
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $this->config = $config;


        if ($this->config['debug']) {
            error_reporting(E_ALL);
        }

        $this->registerProviders();
        $this->registerBase();
        $this->initializeLogger();



        Log::debug('Current config:', $config);
    }


    public function send()
    {
        $iClientProfile = DefaultProfile::getProfile("cn-hangzhou", "Gfe1nnYoR3Brq5pR", "ofKVh0lI3rMKC7eVHr5Bma4Lwpx54k");
        $client = new DefaultAcsClient($iClientProfile);
        $request = new SingleSendSmsRequest();
        $request->setSignName("阿尔纳乐");/*签名名称*/
        $request->setTemplateCode("SMS_18685477");/*模板code*/
        $request->setRecNum("13999411137");/*目标手机号*/
        $request->setParamString("{\"no\":\"1111\"}");/*模板变量，数字一定要转换为字符串*/
        try {
            $response = $client->getAcsResponse($request);
            dump($response);
        } catch (ClientException  $e) {
            dump($e->getErrorCode());
            dump($e->getErrorMessage());
        } catch (ServerException  $e) {
            dump($e->getErrorCode());
            dump($e->getErrorMessage());
        }
    }
}