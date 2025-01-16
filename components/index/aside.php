<?php
function asideElem($lists = [])
{
  $li = '';
  foreach ($lists as $list => $link) {
    $li .= "
    <li>
    <a href=\"$link\" class=\"flex items-center p-2 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-100 group\">
      <span class=\"ml-3\">$list</span>
    </a>
    </li>";
  }
  return "
  <aside class=\"fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0\" aria-label=\"Sidenav\" id=\"drawer-navigation\">
      <div class=\"overflow-y-auto py-5 px-3 h-full bg-white\">
        <ul class=\"space-y-2\">
          $li
        </ul>
        <ul class=\"pt-5 mt-5 space-y-2 border-t border-gray-200\">
          <li>
            <a href=\"./logout.php\" onclick=\"return confirm('Apakah Anda yakin ingin Logout?')\" class=\"flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"size-6\">
            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75\" />
          </svg>
              <span class=\"ml-3\">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
  ";
}
