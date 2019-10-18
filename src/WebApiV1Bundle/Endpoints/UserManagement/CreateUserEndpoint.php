<?php declare(strict_types=1);

namespace App\WebApiV1Bundle\Endpoints\UserManagement;

use App\WebApiV1Bundle\ApiRequest;
use App\WebApiV1Bundle\Endpoints\Endpoint;
use App\WebApiV1Bundle\Response\HttpResponseFactory;
use App\WebApiV1Bundle\Response\JsonSuccessResponse;
use App\WebApiV1Bundle\Schema\EndpointSchema;
use App\WebApiV1Bundle\Schema\RequestMethod;
use App\WebApiV1Bundle\Schema\UrlFragments;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

final class CreateUserEndpoint implements Endpoint
{
    private $httpResponseFactory;

    public function __construct(HttpResponseFactory $httpResponseFactory)
    {
        $this->httpResponseFactory = $httpResponseFactory;
    }

    public function handle(): HttpResponse
    {
        $request = ApiRequest::createFromGlobals();
        $apiResponse = JsonSuccessResponse::fromData([]);
        return $this->httpResponseFactory->create($apiResponse, $request);
    }

    public static function getSchema(): EndpointSchema
    {
        $urlFragments = UrlFragments::fromStrings(['user']);
        $endpointSchema = EndpointSchema::create(RequestMethod::post(), $urlFragments);
        $endpointSchema = $endpointSchema->setSummary('Create a user.');
        $endpointSchema = $endpointSchema->setDescription('By creating a user via this endpoint, an email with an activation link is being triggered.');
        $endpointSchema = $endpointSchema->setTags(['User']);
        $endpointSchema = $endpointSchema->setAuthKeyNeeded(true);
        return $endpointSchema;
    }
}
