<?php

namespace Psecio\Parse\Tests;

use Psecio\Parse\RuleInterface;
use PhpParser\Node;

/**
 * Don't use $GLOBALS, know where your data is coming from
 */
class TestAvoidGlobalsUse implements RuleInterface
{
    use Helper\NameTrait;

    public function getDescription()
    {
        return 'The use of $GLOBALS should be avoided.';
    }

    public function isValid(Node $node)
    {
        return !($node instanceof \PhpParser\Node\Expr\Variable && $node->name == 'GLOBALS');
    }
}
