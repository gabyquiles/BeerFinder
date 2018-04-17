<?php
/**
 * Created by PhpStorm.
 * User: gabrielquiles-perez
 * Date: 4/13/18
 * Time: 11:43 PM
 */

namespace App\Doctrine\DQL;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

/**
 * DQL function for calculating distances between two points
 *
 * Example: DISTANCE(foo.point, POINT_STR(:param))
 */
class Distance extends FunctionNode
{
    private $firstArg;
    private $secondArg;

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        //Need to do this hacky linestring length thing because
        //despite what MySQL manual claims, DISTANCE isn't actually implemented...
        return 'ST_DISTANCE(' .
            $this->firstArg->dispatch($sqlWalker) .
            ', ' .
            $this->secondArg->dispatch($sqlWalker) .
            ')';
    }

    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->firstArg = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->secondArg = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}