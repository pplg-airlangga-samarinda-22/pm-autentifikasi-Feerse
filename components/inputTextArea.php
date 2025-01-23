<?php
function inputTextArea($nameForId, $label, $placeholder, $value = NULL, $isDisabled = false)
{
  if (!$isDisabled) {
    return "
    <label for=\"$nameForId\" class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">$label</label>
    <textarea name=\"$nameForId\" id=\"$nameForId\" rows=\"4\" class=\"block p-2.5 mb-5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500\" placeholder=\"$placeholder\">$value</textarea>
    ";
  } else {
    return "
    <label for=\"$nameForId\" class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">$label</label>
    <textarea name=\"$nameForId\" id=\"$nameForId\" rows=\"4\" class=\"block p-2.5 mb-5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 cursor-not-allowed focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500\" placeholder=\"$placeholder\" disabled>$value</textarea>
    ";
  }
}
