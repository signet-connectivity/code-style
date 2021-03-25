<?php

declare(strict_types=1);

use PHP_CodeSniffer\Standards\Generic\Sniffs\Arrays\ArrayIndentSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Arrays\DisallowLongArraySyntaxSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff;
use PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterCastSniff;
use PHP_CodeSniffer\Standards\PSR12\Sniffs\Files\FileHeaderSniff;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\WhiteSpace\CastSpacingSniff;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\WhiteSpace\FunctionSpacingSniff;
use PhpCsFixer\Fixer\ArrayNotation\NoWhitespaceBeforeCommaInArrayFixer;
use PhpCsFixer\Fixer\ArrayNotation\WhitespaceAfterCommaInArrayFixer;
use PhpCsFixer\Fixer\Basic\BracesFixer;
use PhpCsFixer\Fixer\Basic\EncodingFixer;
use PhpCsFixer\Fixer\Casing\ConstantCaseFixer;
use PhpCsFixer\Fixer\Casing\LowercaseKeywordsFixer;
use PhpCsFixer\Fixer\CastNotation\LowercaseCastFixer;
use PhpCsFixer\Fixer\CastNotation\ShortScalarCastFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer;
use PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleClassElementPerStatementFixer;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\Comment\NoTrailingWhitespaceInCommentFixer;
use PhpCsFixer\Fixer\ControlStructure\ElseifFixer;
use PhpCsFixer\Fixer\ControlStructure\NoBreakCommentFixer;
use PhpCsFixer\Fixer\ControlStructure\SwitchCaseSemicolonToColonFixer;
use PhpCsFixer\Fixer\ControlStructure\SwitchCaseSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\NoSpacesAfterFunctionNameFixer;
use PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer;
use PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\Import\SingleLineAfterImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\DeclareEqualNormalizeFixer;
use PhpCsFixer\Fixer\NamespaceNotation\BlankLineAfterNamespaceFixer;
use PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Operator\NewWithBracesFixer;
use PhpCsFixer\Fixer\Operator\TernaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer;
use PhpCsFixer\Fixer\PhpTag\FullOpeningTagFixer;
use PhpCsFixer\Fixer\PhpTag\NoClosingTagFixer;
use PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\Whitespace\IndentationTypeFixer;
use PhpCsFixer\Fixer\Whitespace\LineEndingFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesInsideParenthesisFixer;
use PhpCsFixer\Fixer\Whitespace\NoTrailingWhitespaceFixer;
use PhpCsFixer\Fixer\Whitespace\SingleBlankLineAtEofFixer;
use SlevomatCodingStandard\Sniffs\Arrays\TrailingArrayCommaSniff;
use SlevomatCodingStandard\Sniffs\Classes\ClassConstantVisibilitySniff;
use SlevomatCodingStandard\Sniffs\Classes\ClassMemberSpacingSniff;
use SlevomatCodingStandard\Sniffs\Classes\ConstantSpacingSniff;
use SlevomatCodingStandard\Sniffs\Classes\EmptyLinesAroundClassBracesSniff;
use SlevomatCodingStandard\Sniffs\Classes\PropertySpacingSniff;
use SlevomatCodingStandard\Sniffs\Classes\RequireConstructorPropertyPromotionSniff;
use SlevomatCodingStandard\Sniffs\Classes\TraitUseDeclarationSniff;
use SlevomatCodingStandard\Sniffs\Exceptions\DeadCatchSniff;
use SlevomatCodingStandard\Sniffs\Functions\RequireTrailingCommaInCallSniff;
use SlevomatCodingStandard\Sniffs\Functions\RequireTrailingCommaInDeclarationSniff;
use SlevomatCodingStandard\Sniffs\Namespaces\AlphabeticallySortedUsesSniff;
use SlevomatCodingStandard\Sniffs\Namespaces\UnusedUsesSniff;
use SlevomatCodingStandard\Sniffs\Namespaces\UseFromSameNamespaceSniff;
use SlevomatCodingStandard\Sniffs\PHP\OptimizedFunctionsWithoutUnpackingSniff;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    // PSR-2
    $services->set(EncodingFixer::class);
    $services->set(FullOpeningTagFixer::class);
    $services->set(BlankLineAfterNamespaceFixer::class);
    $services->set(BracesFixer::class);
    $services->set(ClassDefinitionFixer::class);
    $services->set(ConstantCaseFixer::class);
    $services->set(ElseifFixer::class);
    $services->set(FunctionDeclarationFixer::class);
    $services->set(IndentationTypeFixer::class);
    $services->set(LineEndingFixer::class);
    $services->set(LowercaseKeywordsFixer::class);
    $services->set(MethodArgumentSpaceFixer::class)
        ->call('configure', [
            [
                'ensure_fully_multiline' => true,
            ],
        ]);
    $services->set(NoBreakCommentFixer::class);
    $services->set(NoClosingTagFixer::class);
    $services->set(NoSpacesAfterFunctionNameFixer::class);
    $services->set(NoSpacesInsideParenthesisFixer::class);
    $services->set(NoTrailingWhitespaceFixer::class);
    $services->set(NoTrailingWhitespaceInCommentFixer::class);
    $services->set(SingleBlankLineAtEofFixer::class);
    $services->set(SingleClassElementPerStatementFixer::class)
        ->call('configure', [
            [
                'elements' => ['property'],
            ],
        ]);
    // $services->set(SingleImportPerStatementFixer::class); // Disabled for PSR-12 compliance
    $services->set(SingleLineAfterImportsFixer::class);
    $services->set(SwitchCaseSemicolonToColonFixer::class);
    $services->set(SwitchCaseSpaceFixer::class);
    $services->set(VisibilityRequiredFixer::class);

    // PSR-12
    $services->set(LowercaseCastFixer::class);
    $services->set(ShortScalarCastFixer::class);
    $services->set(BlankLineAfterOpeningTagFixer::class);
    $services->set(NoLeadingImportSlashFixer::class);
    $services->set(OrderedImportsFixer::class)
        ->call('configure', [
            [
                'importsOrder' => ['class', 'function', 'const'],
            ],
        ]);
    $services->set(DeclareEqualNormalizeFixer::class)
        ->call('configure', [
            [
                'space' => 'none',
            ],
        ]);
    $services->set(NewWithBracesFixer::class);
    $services->set(BracesFixer::class)
        ->call('configure', [
            [
                'allow_single_line_closure' => false,
                'position_after_functions_and_oop_constructs' => 'next',
                'position_after_control_structures' => 'same',
                'position_after_anonymous_constructs' => 'same',
            ],
        ]);
    $services->set(NoBlankLinesAfterClassOpeningFixer::class);
    $services->set(VisibilityRequiredFixer::class)
        ->call('configure', [
            [
                'elements' => ['const', 'method', 'property'],
            ],
        ]);
    // $services->set(BinaryOperatorSpacesFixer::class); // See custom section
    $services->set(TernaryOperatorSpacesFixer::class);
    $services->set(UnaryOperatorSpacesFixer::class);
    $services->set(ReturnTypeDeclarationFixer::class);
    $services->set(NoTrailingWhitespaceFixer::class);
    $services->set(ConcatSpaceFixer::class)
        ->call('configure', [
            [
                'spacing' => 'one',
            ],
        ]);
    $services->set(NoSinglelineWhitespaceBeforeSemicolonsFixer::class);
    $services->set(NoWhitespaceBeforeCommaInArrayFixer::class);
    $services->set(WhitespaceAfterCommaInArrayFixer::class);

    // Custom
    $services->set(FileHeaderSniff::class);
    $services->set(TraitUseDeclarationSniff::class);
    $services->set(DisallowLongArraySyntaxSniff::class);
    $services->set(DeclareStrictTypesFixer::class);
    $services->set(UnusedUsesSniff::class);
    $services->set(UseFromSameNamespaceSniff::class);
    $services->set(OptimizedFunctionsWithoutUnpackingSniff::class);
    $services->set(DeadCatchSniff::class);
    $services->set(RequireTrailingCommaInCallSniff::class);
    $services->set(RequireTrailingCommaInDeclarationSniff::class);
    $services->set(RequireConstructorPropertyPromotionSniff::class);
    $services->set(AlphabeticallySortedUsesSniff::class);
    $services->set(ClassConstantVisibilitySniff::class);
    $services->set(TrailingArrayCommaSniff::class);
    $services->set(ArrayIndentSniff::class);
    $services->set(ClassMemberSpacingSniff::class);
    $services->set(CastSpacingSniff::class);
    $services->set(SpaceAfterCastSniff::class);
    $services->set(LineLengthSniff::class)
        ->property('absoluteLineLimit', 120);
    $services->set(FunctionSpacingSniff::class)
        ->property('spacing', 1)
        ->property('spacingBeforeFirst', 0)
        ->property('spacingAfterLast', 0);
    $services->set(PropertySpacingSniff::class)
        ->property('minLinesCountBeforeWithComment', 1)
        ->property('maxLinesCountBeforeWithComment', 1)
        ->property('minLinesCountBeforeWithoutComment', 0)
        ->property('maxLinesCountBeforeWithoutComment', 1);
    $services->set(ConstantSpacingSniff::class)
        ->property('minLinesCountBeforeWithComment', 1)
        ->property('maxLinesCountBeforeWithComment', 1)
        ->property('minLinesCountBeforeWithoutComment', 0)
        ->property('maxLinesCountBeforeWithoutComment', 1);
    $services->set(EmptyLinesAroundClassBracesSniff::class)
        ->property('linesCountAfterOpeningBrace', 0)
        ->property('linesCountBeforeClosingBrace', 0);
    $services->set(BinaryOperatorSpacesFixer::class)
        ->call('configure', [
            [
                'default' => BinaryOperatorSpacesFixer::SINGLE_SPACE,
                'operators' => ['|' => null],
            ],
        ]);
};
