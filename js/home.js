/**
 * Copyright (c) 2016, 2024, 5 Mode
 * 
 * This file is part of LightOff.
 * 
 * LightOff is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * LightOff is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.  
 * 
 * You should have received a copy of the GNU General Public License
 * along with LightOff. If not, see <https://www.gnu.org/licenses/>.
 * 
 * home.js
 * 
 * JS for the Index.
 *
 * @author Daniele Bonini <my25mb@aol.com>
 * @copyrights (c) 2016, 2024, 5 Mode     
 * @license https://opensource.org/licenses/BSD-3-Clause 
 */
 
function LIGHTOFFsetFooterPos() {
  if (document.getElementById("footerCont")) {
    tollerance = 16;
    $("#LIGHTOFFfooterCont").css("top", parseInt( window.innerHeight - $("#LIGHTOFFfooterCont").height() - tollerance ) + "px");
    $("#LIGHTOFFfooter").css("top", parseInt( window.innerHeight - $("#LIGHTOFFfooter").height() - tollerance ) + "px");
  }
}

window.addEventListener("load", function() {
  setTimeout("LIGHTOFFsetFooterPos()", 1000);
}, true);

window.addEventListener("resize", function() {
  setTimeout("LIGHTOFFsetFooterPos()", 1000);
}, true);
  