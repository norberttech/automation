<?php

declare(strict_types=1);

namespace Aeon\Automation\Tests\Unit\Changes\ChangesParser;

use Aeon\Automation\Changes;
use Aeon\Automation\Changes\ChangesParser\HTMLChangesParser;
use Aeon\Automation\Tests\Mother\ChangesSourceMother;
use PHPUnit\Framework\TestCase;

final class HTMLChangesParserTest extends TestCase
{
    public function test_support_for_not_valid_html() : void
    {
        $this->assertFalse((new HTMLChangesParser())->support(ChangesSourceMother::withContent('not valid html')));
    }

    public function test_support_for_html_changes_with_invalid_format() : void
    {
        $this->assertFalse((new HTMLChangesParser())->support(ChangesSourceMother::withContent('<p>not valid html<p/>')));
    }

    public function test_support_valid_html_format() : void
    {
        $content = <<<'HTML'
<div id="change-log">
    <ul id="added">
        <li>added</li>
        </ul>
    <ul id="changed">
        <li>changed</li>
        </ul>
    <ul id="fixed">
        <li>fixed</li>
        </ul>
    <ul id="removed">
        <li>removed</li>
    </ul>
    <ul id="deprecated">
        <li>deprecated</li>
    </ul>
    <ul id="security">
        <li>security</li>
    </ul>
</div>
HTML;

        $changes = (new HTMLChangesParser())->parse($source = ChangesSourceMother::withContent($content));

        $this->assertEquals([new Changes\Change($source, Changes\Type::added(), 'added')], $changes->withType(Changes\Type::added()));
        $this->assertEquals([new Changes\Change($source, Changes\Type::changed(), 'changed')], $changes->withType(Changes\Type::changed()));
        $this->assertEquals([new Changes\Change($source, Changes\Type::fixed(), 'fixed')], $changes->withType(Changes\Type::fixed()));
        $this->assertEquals([new Changes\Change($source, Changes\Type::removed(), 'removed')], $changes->withType(Changes\Type::removed()));
        $this->assertEquals([new Changes\Change($source, Changes\Type::deprecated(), 'deprecated')], $changes->withType(Changes\Type::deprecated()));
        $this->assertEquals([new Changes\Change($source, Changes\Type::security(), 'security')], $changes->withType(Changes\Type::security()));
    }
}
