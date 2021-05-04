<?php

namespace Gskema\ElasticSearchQueryDSL\Matcher\FullText;

use Gskema\ElasticSearchQueryDSL\HasOptionsTrait;
use Gskema\ElasticSearchQueryDSL\Matcher\MatcherInterface;

/**
 * @see TextMatcherTest
 *
 * @options 'phraseSlop' => 0,
 *          'defaultOperator' => 'OR',
 *          'minimumShouldMatch' => 0,
 *          'allowLeadingWildcard' => true,
 *          'analyzeWildcard' => false,
 *          'lenient' => false,
 *          'boost' => 1,
 */
class TextMatcher implements MatcherInterface
{
    use HasOptionsTrait;

    /** @var string */
    protected $query;

    /** @var array */
    protected $fields;

    public function __construct(string $query, array $fields, array $options = [])
    {
        $this->query = $query;
        $this->fields = $fields;
        $this->options = $options;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        $body = [];
        $body['query'] = $this->query;
        $body['fields'] = $this->fields;
        $body += $this->options;

        return [
            'text' => $body,
        ];
    }
}
