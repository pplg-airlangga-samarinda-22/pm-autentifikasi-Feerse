<?php
function inputFile($label, $keterangan, $forNameId)
{
  return "
  <div class=\"max-w-lg mx-auto mb-6\">
  <label for=\"$forNameId\" class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-white\">$label</label>
  <input name=\"$forNameId\" id=\"$forNameId\" class=\"block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400\" type=\"file\">
  <div class=\"mt-1 text-sm text-gray-500 dark:text-gray-300\" id=\"user_avatar_help\">$keterangan</div>
  </div>
  ";
}
