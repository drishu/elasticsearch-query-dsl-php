<?php

namespace Gskema\ElasticSearchQueryDSL\Matcher\FullText;

use Gskema\ElasticSearchQueryDSL\AbstractJsonSerializeTest;

class TextMatcherTest extends AbstractJsonSerializeTest
{
    public function dataTestJsonSerialize(): array
    {
        $dataSets = [];

        // #0
        $dataSets[] = [
            // language=JSON
            '{
                "text" : {
                    "query" : "this AND that OR thus",
                    "fields" : ["field1", "field2"],
                    "phraseSlop" : 10,
                    "defaultOperator" : "AND",
                    "minimumShouldMatch" : 10,
                    "allowLeadingWildcard" : true,
                    "analyzeWildcard" : true,
                    "lenient" : true,
                    "boost" : 1
                }
            }',
            new TextMatcher('this AND that OR thus', ['field1', 'field2'], [
                'phraseSlop' => 10,
                'defaultOperator' => 'AND',
                'minimumShouldMatch' => 10,
                'allowLeadingWildcard' => TRUE,
                'analyzeWildcard' => TRUE,
                'lenient' => TRUE,
                'boost' => 1
            ]),
        ];

        return $dataSets;
    }

    public function testMethods()
    {
        $matcher1 = new TextMatcher('this AND that OR thus', ['default_field' => 'body']);
        $this->assertInstanceOf(TextMatcher::class, $matcher1);
    }
}
