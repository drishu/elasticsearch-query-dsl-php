<?php

namespace Gskema\ElasticSearchQueryDSL\Matcher\FullText;

use Gskema\ElasticSearchQueryDSL\AbstractJsonSerializeTest;

class MatchPhraseMatcherTest extends AbstractJsonSerializeTest
{
    public function dataTestJsonSerialize(): array
    {
        $dataSets = [];

        // #0
        $dataSets[] = [
            // language=JSON
            '{
                "phrase": {
                  "query" : "query1",
                  "field" : "field1"
                }
             }',
            new MatchPhraseMatcher('field1', 'query1'),
        ];

        // #0
        $dataSets[] = [
            // language=JSON
            '{
                "phrase": {
                  "query" : "query1",
                  "field" : "field1",
                  "phraseSlop" : 10,
                  "boost" : 1
                }
             }',
            new MatchPhraseMatcher('field1', 'query1', ['phraseSlop' => 10, 'boost' => 1])
        ];

        return $dataSets;
    }

    public function testMethods()
    {
        $matcher1 = new MatchPhraseMatcher('field1', 'query1');
        $this->assertInstanceOf(MatchPhraseMatcher::class, $matcher1);
    }
}
