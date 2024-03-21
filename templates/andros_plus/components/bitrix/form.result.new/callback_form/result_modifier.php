<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult['funcGetInputHtml'] = function ($question, $arrVALUES) {
  // d($question);
  $id = $question['STRUCTURE'][0]['ID'];
  $type = $question['CAPTION'] === "+ 7" ? "tel" : $question['STRUCTURE'][0]['FIELD_TYPE'];
  $name = "form_{$type}_{$id}";
  $telName = "form_{$question['STRUCTURE'][0]['FIELD_TYPE']}_{$id}";
  $checkboxName = "form_{$question['STRUCTURE'][0]['FIELD_TYPE']}";
  $value = isset($arrVALUES[$name]) ? htmlentities($arrVALUES[$name]) : '';
  $class = 'input size--lg';
  $placeholder = $question['CAPTION'];
  $data_required = $question['REQUIRED'] === 'Y' ? 'data-required' : '';

  switch ($type) {
    case 'checkbox':
      $input = "<input type=\"{$type}\" id=\"checkbox-1\" class=\"input c_input__control\" name=\"{$checkboxName}_checkbox1[]\" value=\"{$id}\" checked {$data_required}>";
      break;

    case 'tel':
      $input = "<input class=\"{$class}\" type=\"{$type}\" name=\"{$telName}\" placeholder=\"{$placeholder}\" value=\"{$value}\" {$data_required}>";
      break;

      // case 'text':
    default:
      $input = "<input class=\"{$class}\" type=\"{$type}\" name=\"{$name}\" placeholder=\"{$placeholder}\" value=\"{$value}\" {$data_required}>";
      break;
  }

  return $input;
};
