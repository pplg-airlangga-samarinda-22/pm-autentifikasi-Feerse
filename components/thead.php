<?php
function thead($cols = [])
{
  $th = '';
  foreach ($cols as $col) {
    $th .= "<th scope=\"col\" class=\"px-4 py-3\">$col</th>";
  }

  return "
  <thead class=\"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400\">
    <tr>
      $th
      <th scope=\"col\" class=\"px-4 py-3\">
        <span class=\"sr-only\">Actions</span>
      </th>
    </tr>
  </thead>
  ";
}
