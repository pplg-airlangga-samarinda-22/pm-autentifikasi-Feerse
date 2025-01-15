<?php
function inputSelect($nameId, $label, $options = [])
{
  $optionsHtml = '';

  foreach ($options as $value => $text) {
    $optionsHtml .= "<option value=\"$value\">$text</option>";
  }

  return "
    <div class=\"mb-4\">
        <label for=\"$nameId\" class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">$label</label>
        <select id=\"$nameId\" name=\"$nameId\" class=\"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500\">
            $optionsHtml
        </select>
    </div>";
}
