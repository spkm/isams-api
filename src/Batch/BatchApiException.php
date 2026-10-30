<?php

namespace spkm\IsamsApi\Batch;

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class BatchApiException extends RequestException
{
    /** @var array{MessageId?: string, MessageName?: string, Title?: string, Description?: string} */
    private array $details;

    public function __construct(Response $response)
    {
        $this->details = self::details($response);
        $name = $this->name();
        $title = $this->title();
        $description = $this->description();

        parent::__construct($response, 'iSAMS Batch API responded '.$response->status().($name ? ': '.$name : '').($title ? ': '.$title : '').($description ? ': '.$description : ''));
    }

    public function name(): ?string
    {
        return $this->details['MessageId'] ?? $this->details['MessageName'] ?? null;
    }

    public function title(): ?string
    {
        return $this->details['Title'] ?? null;
    }

    public function description(): ?string
    {
        return $this->details['Description'] ?? null;
    }

    /**
     * Whether iSAMS refused because of the key itself: unknown, revoked, or not allocated the methods asked for.
     */
    public function isPermissionError(): bool
    {
        return in_array($this->name(), ['InvalidApiKey', 'RevokedApiKey', 'MethodsNotAllocatedToKeyException'], true);
    }

    /**
     * @return array{MessageId?: string, MessageName?: string, Title?: string, Description?: string}
     */
    private static function details(Response $response): array
    {
        $body = trim($response->body());
        $json = json_decode($body, true);

        if (is_array($json)) {
            $message = is_array($json['Message'] ?? null) ? $json['Message'] : $json;
        } else {
            $xml = @simplexml_load_string((string) preg_replace('/^<\?xml[^>]*\?>/', '', $body), options: LIBXML_NONET);
            $message = $xml !== false && $xml->getName() === 'Message' ? array_map('strval', (array) $xml) : [];
        }

        return array_filter(
            array_intersect_key($message, array_flip(['MessageId', 'MessageName', 'Title', 'Description'])),
            fn (mixed $value) => is_string($value) && $value !== '',
        );
    }
}
