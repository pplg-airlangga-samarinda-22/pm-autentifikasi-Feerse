<?php
function inputDisabled($forId, $label, $type, $value)
{
  return "
  <div class=\"mb-5\">
    <label for=\"$forId\" class=\"block mb-2 text-sm font-medium text-gray-900\">$label</label>
    <input type=\"$type\" id=\"$forId\" class=\"mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500\" value=\"$value\" disabled>
  </div>
  ";
}
