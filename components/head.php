<?php
function headElem($title)
{
  return "
  <head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>$title</title>
    <script src=\"https://cdn.tailwindcss.com\"></script>
    <link href=\"https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css\" rel=\"stylesheet\" />
  </head>
  ";
}
