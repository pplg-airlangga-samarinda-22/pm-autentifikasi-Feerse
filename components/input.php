<?php
function input($forNameId, $type, $label, $value = null, $attr = null)
{
  return "
  <div class=\"mb-5\">
  <label for=\"$forNameId\" class=\"block mb-2 text-sm font-medium text-gray-900\">$label</label>
  <input type=\"$type\" name=\"$forNameId\" id=\"$forNameId\" value=\"$value\" class=\"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5\" required $attr />
  </div>
  ";
}
