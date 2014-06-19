function Log_AssignValue(b, a, c, d) {
    a = Math.random();
    d = Math.floor(a * 5);
    d += 1;
    b = "articleId=" + b + "&catId=" + c;
    url = "http://logdantri.vcmedia.vn/_Handler" + d + ".gif?" + b + "&random=" + a;
    b = new Image;
    b.src = url
}
var turnOffYearSpan = false,
    weekStartsOnSunday = false,
    showWeekNumber = true,
    languageCode = "vi",
    calendar_display_time = true,
    todayStringFormat = "[todayString] [UCFdayString], [day], [monthString] [year]",
    pathToImages = "/App_Themes/Default/Images/",
    speedOfSelectBoxSliding = 200,
    intervalSelectBox_minutes = 5,
    calendar_offsetTop = 0,
    calendar_offsetLeft = 0,
    calendarDiv = false,
    MSIE = false,
    Opera = false;
if (navigator.userAgent.indexOf("MSIE") >= 0 && navigator.userAgent.indexOf("Opera") < 0) MSIE = true;
if (navigator.userAgent.indexOf("Opera") >= 0) Opera = true;
switch (languageCode)
{
    case "en":
        var monthArray = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        monthArrayShort = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        dayArray = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
        weekString = "Week",
        todayString = "";
        break;
    case "vi":
        monthArray = ["Th\u00e1ng Gi\u00eang", "Th\u00e1ng Hai", "Th\u00e1ng Ba", "Th\u00e1ng T\u01b0", "Th\u00e1ng N\u0103m", "Th\u00e1ng S\u00e1u", "Th\u00e1ng B\u1ea3y", "Th\u00e1ng T\u00e1m", "Th\u00e1ng Ch\u00edn", "Th\u00e1ng M\u01b0\u1eddi", "Th\u00e1ng M\u01b0\u1eddi M\u1ed9t", "Th\u00e1ng M\u01b0\u1eddi Hai"];
        monthArrayShort = ["Th\u00e1ng Gi\u00eang", "Th\u00e1ng Hai", "Th\u00e1ng Ba", "Th\u00e1ng T\u01b0", "Th\u00e1ng N\u0103m", "Th\u00e1ng S\u00e1u", "Th\u00e1ng B\u1ea3y", "Th\u00e1ng T\u00e1m", "Th\u00e1ng Ch\u00edn", "Th\u00e1ng M\u01b0\u1eddi", "Th\u00e1ng M\u01b0\u1eddi M\u1ed9t", "Th\u00e1ng M\u01b0\u1eddi Hai"];
        dayArray = ["Hai", "Ba", "T\u01b0", "N\u0103m", "S\u00e1u", "B\u1ea3y", "CN"];
        weekString = "Tu\u1ea7n";
        todayString = "H\u00f4m nay Th\u1ee9";
        break
}
if (weekStartsOnSunday)
{
    for (var tempDayName = dayArray[6], theIx = 6; theIx > 0; theIx--) dayArray[theIx] = dayArray[theIx - 1];
    dayArray[0] = tempDayName
}
var daysInMonthArray = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
    currentMonth, currentYear, currentHour, currentMinute, calendarContentDiv, returnDateTo, returnFormat, activeSelectBoxMonth, activeSelectBoxYear, activeSelectBoxHour, activeSelectBoxMinute, iframeObj = false,
    iframeObj2 = false;

function EIS_FIX_EI1(b) {
    if (iframeObj2)
    {
        iframeObj2.style.display = "block";
        iframeObj2.style.height = document.getElementById(b)
            .offsetHeight + 1;
        iframeObj2.style.width = document.getElementById(b)
            .offsetWidth;
        iframeObj2.style.left = getleftPos(document.getElementById(b)) + 1 - calendar_offsetLeft;
        iframeObj2.style.top = getTopPos(document.getElementById(b)) - document.getElementById(b)
            .offsetHeight - calendar_offsetTop
    }
}
function EIS_Hide_Frame() {
    if (iframeObj2) iframeObj2.style.display = "none"
}
var returnDateToYear, returnDateToMonth, returnDateToDay, returnDateToHour, returnDateToMinute, inputYear, inputMonth, inputDay, inputHour, inputMinute, calendarDisplayTime = false,
    selectBoxHighlightColor = "#D60808",
    selectBoxRolloverBgColor = "#E2EBED",
    selectBoxMovementInProgress = false,
    activeSelectBox = false;

function cancelCalendarEvent() {
    return false
}
function isLeapYear(b) {
    if (b % 400 == 0 || b % 4 == 0 && b % 100 != 0) return true;
    return false
}
var activeSelectBoxDirection = activeSelectBoxMonth = false;

function highlightMonthYear() {
    if (activeSelectBoxMonth) activeSelectBoxMonth.className = "";
    activeSelectBox = this;
    if (this.className == "monthYearActive") this.className = "";
    else
    {
        this.className = "monthYearActive";
        activeSelectBoxMonth = this
    }
    if (this.innerHTML.indexOf("-") >= 0 || this.innerHTML.indexOf("+") >= 0)
    {
        selectBoxMovementInProgress = this.className == "monthYearActive" ? true : false;
        activeSelectBoxDirection = this.innerHTML.indexOf("-") >= 0 ? -1 : 1
    } else selectBoxMovementInProgress = false
}

function showMonthDropDown() {
    if (document.getElementById("monthDropDown")
        .style.display == "block")
    {
        document.getElementById("monthDropDown")
            .style.display = "none";
        EIS_Hide_Frame()
    } else
    {
        document.getElementById("monthDropDown")
            .style.display = "block";
        document.getElementById("yearDropDown")
            .style.display = "none";
        document.getElementById("hourDropDown")
            .style.display = "none";
        document.getElementById("minuteDropDown")
            .style.display = "none";
        MSIE && EIS_FIX_EI1("monthDropDown")
    }
}

function showYearDropDown() {
    if (document.getElementById("yearDropDown")
        .style.display == "block")
    {
        document.getElementById("yearDropDown")
            .style.display = "none";
        EIS_Hide_Frame()
    } else
    {
        document.getElementById("yearDropDown")
            .style.display = "block";
        document.getElementById("monthDropDown")
            .style.display = "none";
        document.getElementById("hourDropDown")
            .style.display = "none";
        document.getElementById("minuteDropDown")
            .style.display = "none";
        MSIE && EIS_FIX_EI1("yearDropDown")
    }
}

function showHourDropDown() {
    if (document.getElementById("hourDropDown")
        .style.display == "block")
    {
        document.getElementById("hourDropDown")
            .style.display = "none";
        EIS_Hide_Frame()
    } else
    {
        document.getElementById("hourDropDown")
            .style.display = "block";
        document.getElementById("monthDropDown")
            .style.display = "none";
        document.getElementById("yearDropDown")
            .style.display = "none";
        document.getElementById("minuteDropDown")
            .style.display = "none";
        MSIE && EIS_FIX_EI1("hourDropDown")
    }
}

function showMinuteDropDown() {
    if (document.getElementById("minuteDropDown")
        .style.display == "block")
    {
        document.getElementById("minuteDropDown")
            .style.display = "none";
        EIS_Hide_Frame()
    } else
    {
        document.getElementById("minuteDropDown")
            .style.display = "block";
        document.getElementById("monthDropDown")
            .style.display = "none";
        document.getElementById("yearDropDown")
            .style.display = "none";
        document.getElementById("hourDropDown")
            .style.display = "none";
        MSIE && EIS_FIX_EI1("minuteDropDown")
    }
}

function selectMonth() {
    document.getElementById("calendar_month_txt")
        .innerHTML = this.innerHTML;
    currentMonth = this.id.replace(/[^\d]/g, "");
    document.getElementById("monthDropDown")
        .style.display = "none";
    EIS_Hide_Frame();
    for (var b = 0; b < monthArray.length; b++) document.getElementById("monthDiv_" + b)
        .style.color = "";
    this.style.color = selectBoxHighlightColor;
    activeSelectBoxMonth = this;
    writeCalendarContent()
}

function selectHour() {
    document.getElementById("calendar_hour_txt")
        .innerHTML = this.innerHTML;
    currentHour = this.innerHTML.replace(/[^\d]/g, "");
    document.getElementById("hourDropDown")
        .style.display = "none";
    EIS_Hide_Frame();
    if (activeSelectBoxHour) activeSelectBoxHour.style.color = "";
    activeSelectBoxHour = this;
    this.style.color = selectBoxHighlightColor
}

function selectMinute() {
    document.getElementById("calendar_minute_txt")
        .innerHTML = this.innerHTML;
    currentMinute = this.innerHTML.replace(/[^\d]/g, "");
    document.getElementById("minuteDropDown")
        .style.display = "none";
    EIS_Hide_Frame();
    if (activeSelectBoxMinute) activeSelectBoxMinute.style.color = "";
    activeSelectBoxMinute = this;
    this.style.color = selectBoxHighlightColor
}

function selectYear() {
    document.getElementById("calendar_year_txt")
        .innerHTML = this.innerHTML;
    currentYear = this.innerHTML.replace(/[^\d]/g, "");
    document.getElementById("yearDropDown")
        .style.display = "none";
    EIS_Hide_Frame();
    if (activeSelectBoxYear) activeSelectBoxYear.style.color = "";
    activeSelectBoxYear = this;
    this.style.color = selectBoxHighlightColor;
    writeCalendarContent()
}

function switchMonth() {
    if (this.src.indexOf("left") >= 0)
    {
        currentMonth -= 1;
        if (currentMonth < 0)
        {
            currentMonth = 11;
            currentYear -= 1
        }
    } else
    {
        currentMonth += 1;
        if (currentMonth > 11)
        {
            currentMonth = 0;
            currentYear = currentYear / 1 + 1
        }
    }
    writeCalendarContent()
}

function createMonthDiv() {
    var b = document.createElement("DIV");
    b.className = "monthYearPicker";
    b.id = "monthPicker";
    for (var a = 0; a < monthArray.length; a++)
    {
        var c = document.createElement("DIV");
        c.innerHTML = monthArray[a];
        c.onmouseover = highlightMonthYear;
        c.onmouseout = highlightMonthYear;
        c.onclick = selectMonth;
        c.id = "monthDiv_" + a;
        c.style.width = "90px";
        c.onselectstart = cancelCalendarEvent;
        b.appendChild(c);
        if (currentMonth && currentMonth == a)
        {
            c.style.color = selectBoxHighlightColor;
            activeSelectBoxMonth = c
        }
    }
    return b
}

function changeSelectBoxYear(b, a) {
    a || (a = this);
    b = a.parentNode.getElementsByTagName("DIV");
    a = a.innerHTML.indexOf("-") >= 0 ? b[1].innerHTML / 1 - 1 : b[1].innerHTML / 1 + 1;
    if (activeSelectBoxYear) activeSelectBoxYear.style.color = "";
    for (var c = 1; c < b.length - 1; c++)
    {
        b[c].innerHTML = a + c - 1;
        b[c].id = "yearDiv" + (a / 1 + c / 1 - 1)
    }
    if (activeSelectBoxYear)
    {
        activeSelectBoxYear.style.color = "";
        if (document.getElementById("yearDiv" + currentYear))
        {
            activeSelectBoxYear = document.getElementById("yearDiv" + currentYear);
            activeSelectBoxYear.style.color = selectBoxHighlightColor
        }
    }
}

function changeSelectBoxHour(b, a) {
    a || (a = this);
    b = a.parentNode.getElementsByTagName("DIV");
    if (a.innerHTML.indexOf("-") >= 0)
    {
        a = b[1].innerHTML / 1 - 1;
        if (a < 0) a = 0
    } else
    {
        a = b[1].innerHTML / 1 + 1;
        if (a > 14) a = 14
    }
    if (activeSelectBoxHour) activeSelectBoxHour.style.color = "";
    for (var c = "", d = 1; d < b.length - 1; d++)
    {
        c = a / 1 + d / 1 < 11 ? "0" : "";
        b[d].innerHTML = c + (a + d - 1);
        b[d].id = "hourDiv" + (a / 1 + d / 1 - 1)
    }
    if (activeSelectBoxHour)
    {
        activeSelectBoxHour.style.color = "";
        if (document.getElementById("hourDiv" + currentHour))
        {
            activeSelectBoxHour = document.getElementById("hourDiv" + currentHour);
            activeSelectBoxHour.style.color = selectBoxHighlightColor
        }
    }
}
function updateYearDiv() {
    var b = 5;
    if (turnOffYearSpan) b = 0;
    var a = document.getElementById("yearDropDown");
    a = a.getElementsByTagName("DIV");
    for (var c = 1; c < a.length - 1; c++)
    {
        a[c].innerHTML = currentYear / 1 - b + c;
        if (currentYear == currentYear / 1 - b + c)
        {
            a[c].style.color = selectBoxHighlightColor;
            activeSelectBoxYear = a[c]
        } else a[c].style.color = ""
    }
}

function updateMonthDiv() {
    for (no = 0; no < 12; no++) document.getElementById("monthDiv_" + no)
        .style.color = "";
    document.getElementById("monthDiv_" + currentMonth)
        .style.color = selectBoxHighlightColor;
    activeSelectBoxMonth = document.getElementById("monthDiv_" + currentMonth)
}

function updateHourDiv() {
    var b = document.getElementById("hourDropDown");
    b = b.getElementsByTagName("DIV");
    var a = 0;
    if (currentHour / 1 - 6 + 1 < 0) a = (currentHour / 1 - 6 + 1) * -1;
    for (var c = 1; c < b.length - 1; c++)
    {
        var d = "";
        if (currentHour / 1 - 6 + c + a < 10) d = "0";
        b[c].innerHTML = d + (currentHour / 1 - 6 + c + a);
        if (currentHour == currentHour / 1 - 6 + c)
        {
            b[c].style.color = selectBoxHighlightColor;
            activeSelectBoxHour = b[c]
        } else b[c].style.color = ""
    }
}

function updateMinuteDiv() {
    for (no = 0; no < 60; no += intervalSelectBox_minutes)
    {
        var b = "";
        if (no < 10) b = "0";
        document.getElementById("minuteDiv_" + b + no)
            .style.color = ""
    }
    if (document.getElementById("minuteDiv_" + currentMinute))
    {
        document.getElementById("minuteDiv_" + currentMinute)
            .style.color = selectBoxHighlightColor;
        activeSelectBoxMinute = document.getElementById("minuteDiv_" + currentMinute)
    }
}

function createYearDiv() {
    if (document.getElementById("yearDropDown"))
    {
        c = document.getElementById("yearDropDown");
        for (var b = c.getElementsByTagName("DIV"), a = 0; a < b.length; a++) b[a].parentNode.removeChild(b[a])
    } else
    {
        var c = document.createElement("DIV");
        c.className = "monthYearPicker"
    }
    a = new Date;
    currentYear && a.setFullYear(currentYear);
    b = a.getFullYear() / 1 - 5;
    var d = 10;
    if (turnOffYearSpan)
    {
        b = a.getFullYear() / 1 - 0;
        d = 2
    } else
    {
        var e = document.createElement("DIV");
        e.innerHTML = "  - ";
        e.onclick = changeSelectBoxYear;
        e.onmouseover = highlightMonthYear;
        e.onmouseout = function () {
            selectBoxMovementInProgress = false
        };
        e.onselectstart = cancelCalendarEvent;
        c.appendChild(e)
    }
    for (a = b; a < b + d; a++)
    {
        e = document.createElement("DIV");
        e.innerHTML = a;
        e.onmouseover = highlightMonthYear;
        e.onmouseout = highlightMonthYear;
        e.onclick = selectYear;
        e.id = "yearDiv" + a;
        e.onselectstart = cancelCalendarEvent;
        c.appendChild(e);
        if (currentYear && currentYear == a)
        {
            e.style.color = selectBoxHighlightColor;
            activeSelectBoxYear = e
        }
    }
    if (!turnOffYearSpan)
    {
        e = document.createElement("DIV");
        e.innerHTML = "  + ";
        e.onclick = changeSelectBoxYear;
        e.onmouseover = highlightMonthYear;
        e.onmouseout = function () {
            selectBoxMovementInProgress = false
        };
        e.onselectstart = cancelCalendarEvent;
        c.appendChild(e)
    }
    return c
}

function slideCalendarSelectBox() {
    if (selectBoxMovementInProgress)
    {
        activeSelectBox.parentNode.id == "hourDropDown" && changeSelectBoxHour(false, activeSelectBox);
        activeSelectBox.parentNode.id == "yearDropDown" && changeSelectBoxYear(false, activeSelectBox)
    }
    setTimeout("slideCalendarSelectBox()", speedOfSelectBoxSliding)
}

function createHourDiv() {
    if (document.getElementById("hourDropDown"))
    {
        c = document.getElementById("hourDropDown");
        for (var b = c.getElementsByTagName("DIV"), a = 0; a < b.length; a++) b[a].parentNode.removeChild(b[a])
    } else
    {
        var c = document.createElement("DIV");
        c.className = "monthYearPicker"
    }
    currentHour || (currentHour = 0);
    b = currentHour / 1;
    if (b > 14) b = 14;
    var d = document.createElement("DIV");
    d.innerHTML = "  - ";
    d.onclick = changeSelectBoxHour;
    d.onmouseover = highlightMonthYear;
    d.onmouseout = function () {
        selectBoxMovementInProgress = false
    };
    d.onselectstart = cancelCalendarEvent;
    c.appendChild(d);
    for (a = b; a < b + 10; a++)
    {
        var e = "";
        if (a / 1 < 10) e = "0";
        d = document.createElement("DIV");
        d.innerHTML = e + a;
        d.onmouseover = highlightMonthYear;
        d.onmouseout = highlightMonthYear;
        d.onclick = selectHour;
        d.id = "hourDiv" + a;
        d.onselectstart = cancelCalendarEvent;
        c.appendChild(d);
        if (currentYear && currentYear == a)
        {
            d.style.color = selectBoxHighlightColor;
            activeSelectBoxYear = d
        }
    }
    d = document.createElement("DIV");
    d.innerHTML = "  + ";
    d.onclick = changeSelectBoxHour;
    d.onmouseover = highlightMonthYear;
    d.onmouseout = function () {
        selectBoxMovementInProgress = false
    };
    d.onselectstart = cancelCalendarEvent;
    c.appendChild(d);
    return c
}

function createMinuteDiv() {
    if (document.getElementById("minuteDropDown"))
    {
        c = document.getElementById("minuteDropDown");
        for (var b = c.getElementsByTagName("DIV"), a = 0; a < b.length; a++) b[a].parentNode.removeChild(b[a])
    } else
    {
        var c = document.createElement("DIV");
        c.className = "monthYearPicker"
    }
    for (a = a = 0; a < 60; a += intervalSelectBox_minutes)
    {
        b = a < 10 ? "0" : "";
        var d = document.createElement("DIV");
        d.innerHTML = b + a;
        d.onmouseover = highlightMonthYear;
        d.onmouseout = highlightMonthYear;
        d.onclick = selectMinute;
        d.id = "minuteDiv_" + b + a;
        d.onselectstart = cancelCalendarEvent;
        c.appendChild(d);
        if (currentYear && currentYear == a)
        {
            d.style.color = selectBoxHighlightColor;
            activeSelectBoxYear = d
        }
    }
    return c
}

function highlightSelect() {
    if (this.className == "selectBoxTime")
    {
        this.className = "selectBoxTimeOver";
        this.getElementsByTagName("IMG")[0].src = pathToImages + "down_time_over.gif"
    } else if (this.className == "selectBoxTimeOver")
    {
        this.className = "selectBoxTime";
        this.getElementsByTagName("IMG")[0].src = pathToImages + "down_time.gif"
    }
    if (this.className == "selectBox")
    {
        this.className = "selectBoxOver";
        this.getElementsByTagName("IMG")[0].src = pathToImages + "down_over.gif"
    } else if (this.className == "selectBoxOver")
    {
        this.className = "selectBox";
        this.getElementsByTagName("IMG")[0].src = pathToImages + "down.gif"
    }
}
function highlightArrow() {
    if (this.src.indexOf("over") >= 0)
    {
        if (this.src.indexOf("left") >= 0) this.src = pathToImages + "left.gif";
        if (this.src.indexOf("right") >= 0) this.src = pathToImages + "right.gif"
    } else
    {
        if (this.src.indexOf("left") >= 0) this.src = pathToImages + "left_over.gif";
        if (this.src.indexOf("right") >= 0) this.src = pathToImages + "right_over.gif"
    }
}

function highlightClose() {
    this.src = this.src.indexOf("over") >= 0 ? pathToImages + "close.gif" : pathToImages + "close_over.gif"
}

function closeCalendar() {
    document.getElementById("yearDropDown")
        .style.display = "none";
    document.getElementById("monthDropDown")
        .style.display = "none";
    document.getElementById("hourDropDown")
        .style.display = "none";
    document.getElementById("minuteDropDown")
        .style.display = "none";
    calendarDiv.style.display = "none";
    if (iframeObj)
    {
        iframeObj.style.display = "none";
        EIS_Hide_Frame()
    }
    if (activeSelectBoxMonth) activeSelectBoxMonth.className = "";
    if (activeSelectBoxYear) activeSelectBoxYear.className = ""
}

function writeTopBar() {
    var b = document.createElement("DIV");
    b.className = "topBar";
    b.id = "topBar";
    calendarDiv.appendChild(b);
    var a = document.createElement("DIV");
    a.style.marginRight = "1px";
    var c = document.createElement("IMG");
    c.src = pathToImages + "left.gif";
    c.onmouseover = highlightArrow;
    c.onclick = switchMonth;
    c.onmouseout = highlightArrow;
    a.appendChild(c);
    b.appendChild(a);
    if (Opera) a.style.width = "16px";
    a = document.createElement("DIV");
    a.style.marginRight = "1px";
    c = document.createElement("IMG");
    c.src = pathToImages + "right.gif";
    c.onclick = switchMonth;
    c.onmouseover = highlightArrow;
    c.onmouseout = highlightArrow;
    a.appendChild(c);
    if (Opera) a.style.width = "16px";
    b.appendChild(a);
    a = document.createElement("DIV");
    a.id = "monthSelect";
    a.onmouseover = highlightSelect;
    a.onmouseout = highlightSelect;
    a.onclick = showMonthDropDown;
    c = document.createElement("SPAN");
    c.innerHTML = monthArray[currentMonth];
    c.id = "calendar_month_txt";
    a.appendChild(c);
    c = document.createElement("IMG");
    c.src = pathToImages + "down.gif";
    c.style.position = "absolute";
    c.style.right = "0px";
    a.appendChild(c);
    a.className = "selectBox";
    if (Opera)
    {
        c.style.cssText = "float:right;position:relative";
        c.style.position = "relative";
        c.style.styleFloat = "right"
    }
    b.appendChild(a);
    c = createMonthDiv();
    c.style.left = "37px";
    c.style.top = a.offsetTop + a.offsetHeight + 1 + "px";
    c.style.width = "95px";
    c.id = "monthDropDown";
    calendarDiv.appendChild(c);
    var d = document.createElement("DIV");
    d.onmouseover = highlightSelect;
    d.onmouseout = highlightSelect;
    d.onclick = showYearDropDown;
    c = document.createElement("SPAN");
    c.innerHTML = currentYear;
    c.id = "calendar_year_txt";
    d.appendChild(c);
    b.appendChild(d);
    c = document.createElement("IMG");
    c.src = pathToImages + "down.gif";
    d.appendChild(c);
    d.className = "selectBox";
    if (Opera)
    {
        d.style.width = "50px";
        c.style.cssText = "float:right";
        c.style.position = "relative";
        c.style.styleFloat = "right"
    }
    c = createYearDiv();
    c.style.left = "143px";
    c.style.top = a.offsetTop + a.offsetHeight + 1 + "px";
    c.style.width = "35px";
    c.id = "yearDropDown";
    calendarDiv.appendChild(c);
    c = document.createElement("IMG");
    c.src = pathToImages + "close.gif";
    c.style.styleFloat = "right";
    c.onmouseover = highlightClose;
    c.onmouseout = highlightClose;
    c.onclick = closeCalendar;
    b.appendChild(c);
    if (!document.all)
    {
        c.style.position = "absolute";
        c.style.right = "2px"
    }
}

function writeCalendarContent() {
    var b = true;
    if (!calendarContentDiv)
    {
        calendarContentDiv = document.createElement("DIV");
        calendarDiv.appendChild(calendarContentDiv);
        b = false
    }
    currentMonth /= 1;
    var a = new Date;
    a.setFullYear(currentYear);
    a.setDate(1);
    a.setMonth(currentMonth);
    var c = a.getDay();
    if (!weekStartsOnSunday)
    {
        if (c == 0) c = 7;
        c--
    }
    document.getElementById("calendar_year_txt")
        .innerHTML = currentYear;
    document.getElementById("calendar_month_txt")
        .innerHTML = monthArray[currentMonth];
    document.getElementById("calendar_hour_txt")
        .innerHTML = currentHour;
    document.getElementById("calendar_minute_txt")
        .innerHTML = currentMinute;
    var d = calendarContentDiv.getElementsByTagName("TABLE");
    d.length > 0 && calendarContentDiv.removeChild(d[0]);
    var e = document.createElement("TABLE");
    e.width = "100%";
    e.cellSpacing = "0";
    calendarContentDiv.appendChild(e);
    d = document.createElement("TBODY");
    e.appendChild(d);
    e = d.insertRow(-1);
    e.className = "calendar_week_row";
    if (showWeekNumber)
    {
        var f = e.insertCell(-1);
        f.innerHTML = weekString;
        f.className = "calendar_week_column"
    }
    for (var g = 0; g < dayArray.length; g++)
    {
        f = e.insertCell(-1);
        f.innerHTML = dayArray[g]
    }
    e = d.insertRow(-1);
    if (showWeekNumber)
    {
        f = e.insertCell(-1);
        f.className = "calendar_week_column";
        var k = getWeek(currentYear, currentMonth, 1);
        f.innerHTML = k
    }
    for (g = 0; g < c; g++)
    {
        f = e.insertCell(-1);
        f.innerHTML = " "
    }
    c = c;
    var l = daysInMonthArray[currentMonth];
    if (l == 28) if (isLeapYear(currentYear)) l = 29;
    for (g = 1; g <= l; g++)
    {
        a.setDate(g - 1);
        if (c > 0 && c % 7 == 0)
        {
            e = d.insertRow(-1);
            if (showWeekNumber)
            {
                f = e.insertCell(-1);
                f.className = "calendar_week_column";
                k = getWeek(currentYear,
                currentMonth, g);
                f.innerHTML = k
            }
        }
        f = e.insertCell(-1);
        if (currentYear == inputYear && currentMonth == inputMonth && g == inputDay) f.className = "activeDay";
        f.innerHTML = g;
        f.onclick = pickDate;
        if (currentYear > inputYear || currentYear == inputYear && currentMonth > inputMonth || currentYear == inputYear && currentMonth == inputMonth && g > inputDay)
        {
            f.className = "overday";
            f.onclick = ""
        }
        c++
    }
    if (!document.all) if (calendarContentDiv.offsetHeight) document.getElementById("topBar")
        .style.top = calendarContentDiv.offsetHeight + document.getElementById("timeBar")
        .offsetHeight + document.getElementById("topBar")
        .offsetHeight - 1 + "px";
    else
    {
        document.getElementById("topBar")
            .style.top = "";
        document.getElementById("topBar")
            .style.bottom = "0px"
    }
    if (iframeObj) b ? setTimeout("resizeIframe()", 10) : setTimeout("resizeIframe()", 350)
}
function resizeIframe() {
    iframeObj.style.width = calendarDiv.offsetWidth + "px";
    iframeObj.style.height = calendarDiv.offsetHeight + "px"
}
function pickTodaysDate() {
    var b = new Date;
    currentMonth = b.getMonth();
    currentYear = b.getFullYear();
    pickDate(false, b.getDate())
}

function pickDate(b, a) {
    b = currentMonth / 1 + 1;
    if (b < 10) b = "0" + b;
    a = !a && this ? this.innerHTML : a;
    if (a / 1 < 10) a = "0" + a;
    if (returnFormat)
    {
        returnFormat = returnFormat.replace("dd", a);
        returnFormat = returnFormat.replace("mm", b);
        returnFormat = returnFormat.replace("yyyy", currentYear);
        returnFormat = returnFormat.replace("hh", currentHour);
        returnFormat = returnFormat.replace("ii", currentMinute);
        returnFormat = returnFormat.replace("d", a / 1);
        returnFormat = returnFormat.replace("m", b / 1);
        try
        {
            returnDateTo.onchange()
        } catch (c) { }
    } else
    {
        for (var d = 0; d < returnDateToYear.options.length; d++) if (returnDateToYear.options[d].value == currentYear)
        {
            returnDateToYear.selectedIndex = d;
            break
        }
        for (d = 0; d < returnDateToMonth.options.length; d++) if (returnDateToMonth.options[d].value == parseInt(b))
        {
            returnDateToMonth.selectedIndex = d;
            break
        }
        for (d = 0; d < returnDateToDay.options.length; d++) if (returnDateToDay.options[d].value == parseInt(a))
        {
            returnDateToDay.selectedIndex = d;
            break
        }
        if (calendarDisplayTime)
        {
            for (d = 0; d < returnDateToHour.options.length; d++) if (returnDateToHour.options[d].value == parseInt(currentHour))
            {
                returnDateToHour.selectedIndex = d;
                break
            }
            for (d = 0; d < returnDateToMinute.options.length; d++) if (returnDateToMinute.options[d].value == parseInt(currentMinute))
            {
                returnDateToMinute.selectedIndex = d;
                break
            }
        }
    }
    closeCalendar();
    b = document.getElementById("hidZoneID");
    a = document.getElementById("hidParentZoneID");
    location.href = "/" + a.value + "d" + b.value + "/" + returnFormat + ".htm"
}

function getWeek(b, a, c) {
    if (weekStartsOnSunday) c = c / 1 + 1;
    else c /= 1;
    b /= 1;
    a = a / 1 + 1;
    var d = Math.floor((14 - a) / 12);
    b = b + 4800 - d;
    a = a + 12 * d - 3;
    c = c + Math.floor((153 * a + 2) / 5) + 365 * b + Math.floor(b / 4) - Math.floor(b / 100) + Math.floor(b / 400) - 32045;
    c = (c + 31741 - c % 7) % 146097 % 36524 % 1461;
    a = Math.floor(c / 1460);
    c = (c - a) % 365 + a;
    return NumberOfWeek = Math.floor(c / 7) + 1
}

function writeTimeBar() {
    var b = document.createElement("DIV");
    b.id = "timeBar";
    b.className = "timeBar";
    var a = document.createElement("DIV");
    a.innerHTML = "Time:";
    a = document.createElement("DIV");
    a.onmouseover = highlightSelect;
    a.onmouseout = highlightSelect;
    a.onclick = showHourDropDown;
    a.style.width = "30px";
    var c = document.createElement("SPAN");
    c.innerHTML = currentHour;
    c.id = "calendar_hour_txt";
    a.appendChild(c);
    b.appendChild(a);
    c = document.createElement("IMG");
    c.src = pathToImages + "down_time.gif";
    a.appendChild(c);
    a.className = "selectBoxTime";
    if (Opera)
    {
        a.style.width = "30px";
        c.style.cssText = "float:right";
        c.style.position = "relative";
        c.style.styleFloat = "right"
    }
    a = createHourDiv();
    a.style.left = "130px";
    a.style.width = "35px";
    a.id = "hourDropDown";
    calendarDiv.appendChild(a);
    a = document.createElement("DIV");
    a.onmouseover = highlightSelect;
    a.onmouseout = highlightSelect;
    a.onclick = showMinuteDropDown;
    a.style.width = "30px";
    c = document.createElement("SPAN");
    c.innerHTML = currentMinute;
    c.id = "calendar_minute_txt";
    a.appendChild(c);
    b.appendChild(a);
    c = document.createElement("IMG");
    c.src = pathToImages + "down_time.gif";
    a.appendChild(c);
    a.className = "selectBoxTime";
    if (Opera)
    {
        a.style.width = "30px";
        c.style.cssText = "float:right";
        c.style.position = "relative";
        c.style.styleFloat = "right"
    }
    a = createMinuteDiv();
    a.style.left = "167px";
    a.style.width = "35px";
    a.id = "minuteDropDown";
    calendarDiv.appendChild(a);
    return b
}

function writeBottomBar() {
    var b = new Date,
        a = document.createElement("DIV");
    a.id = "bottomBar";
    a.style.cursor = "pointer";
    a.className = "todaysDate";
    var c = document.createElement("DIV");
    c.onclick = pickTodaysDate;
    c.id = "todaysDateString";
    c.style.width = calendarDiv.offsetWidth - 95 + "px";
    var d = b.getDay();
    if (!weekStartsOnSunday)
    {
        if (d == 0) d = 7;
        d--
    }
    var e = todayStringFormat;
    e = e.replace("[monthString]", monthArrayShort[b.getMonth()]);
    e = e.replace("[day]", b.getDate());
    e = e.replace("[year]", b.getFullYear());
    e = e.replace("[dayString]",
    dayArray[d].toLowerCase());
    e = e.replace("[UCFdayString]", dayArray[d]);
    e = e.replace("[todayString]", todayString);
    c.innerHTML = todayString + ": " + b.getDate() + ". " + monthArrayShort[b.getMonth()] + ", " + b.getFullYear();
    c.innerHTML = e;
    a.appendChild(c);
    b = writeTimeBar();
    a.appendChild(b);
    calendarDiv.appendChild(a)
}
function getTopPos(b) {
    for (var a = b.offsetTop + b.offsetHeight;
    (b = b.offsetParent) != null; ) a += b.offsetTop;
    return a + calendar_offsetTop
}

function getleftPos(b) {
    for (var a = b.offsetLeft;
    (b = b.offsetParent) != null; ) a += b.offsetLeft;
    return a + calendar_offsetLeft
}
function positionCalendar(b) {
    calendarDiv.style.left = getleftPos(b) + "px";
    calendarDiv.style.top = getTopPos(b) + "px";
    if (iframeObj)
    {
        iframeObj.style.left = calendarDiv.style.left;
        iframeObj.style.top = calendarDiv.style.top;
        iframeObj2.style.left = calendarDiv.style.left;
        iframeObj2.style.top = calendarDiv.style.top
    }
}

function initCalendar() {
    if (MSIE)
    {
        iframeObj = document.createElement("IFRAME");
        iframeObj.style.filter = "alpha(opacity=0)";
        iframeObj.style.position = "absolute";
        iframeObj.border = "0px";
        iframeObj.style.border = "0px";
        iframeObj.style.backgroundColor = "#FF0000";
        iframeObj2 = document.createElement("IFRAME");
        iframeObj2.style.position = "absolute";
        iframeObj2.border = "0px";
        iframeObj2.style.border = "0px";
        iframeObj2.style.height = "1px";
        iframeObj2.style.width = "1px";
        iframeObj2.src = "blank.html";
        iframeObj.src = "blank.html";
        document.body.appendChild(iframeObj2);
        document.body.appendChild(iframeObj)
    }
    calendarDiv = document.createElement("DIV");
    calendarDiv.id = "calendarDiv";
    calendarDiv.style.zIndex = 1E3;
    slideCalendarSelectBox();
    document.body.appendChild(calendarDiv);
    writeBottomBar();
    writeTopBar();
    if (!currentYear)
    {
        var b = new Date;
        currentMonth = b.getMonth();
        currentYear = b.getFullYear()
    }
    writeCalendarContent()
}

function setTimeProperties() {
    if (calendarDisplayTime)
    {
        document.getElementById("timeBar")
            .style.display = "block";
        document.getElementById("timeBar")
            .style.visibility = "visible";
        document.getElementById("hourDropDown")
            .style.top = document.getElementById("calendar_minute_txt")
            .parentNode.offsetHeight + calendarContentDiv.offsetHeight + document.getElementById("topBar")
            .offsetHeight + "px";
        document.getElementById("minuteDropDown")
            .style.top = document.getElementById("calendar_minute_txt")
            .parentNode.offsetHeight + calendarContentDiv.offsetHeight + document.getElementById("topBar")
            .offsetHeight + "px";
        document.getElementById("minuteDropDown")
            .style.right = "50px";
        document.getElementById("hourDropDown")
            .style.right = "50px";
        document.getElementById("todaysDateString")
            .style.width = "115px"
    } else
    {
        document.getElementById("timeBar")
            .style.display = "none";
        document.getElementById("timeBar")
            .style.visibility = "hidden";
        document.getElementById("todaysDateString")
            .style.width = "100%"
    }
}
function calendarSortItems(b, a) {
    return b / 1 - a / 1
}

function displayCalendar(b, a, c, d, e) {
    calendarDisplayTime = d ? true : false;
    if (b.value.length > 6) if (b.value.match(/^[0-9]*?$/gi))
    {
        d = a.indexOf("mm");
        currentMonth = b.value.substr(d, 2) / 1 - 1;
        d = a.indexOf("yyyy");
        currentYear = b.value.substr(d, 4);
        d = a.indexOf("dd");
        tmpDay = b.value.substr(d, 2);
        d = a.indexOf("hh");
        currentHour = d >= 0 ? (tmpHour = b.value.substr(d, 2)) : "00";
        d = a.indexOf("ii");
        currentMinute = d >= 0 ? (tmpMinute = b.value.substr(d, 2)) : "00"
    } else
    {
        b.value.split(/[^0-9]/gi);
        d = {};
        d.m = a.indexOf("mm");
        if (d.m == -1) d.m = a.indexOf("m");
        d.d = a.indexOf("dd");
        if (d.d == -1) d.d = a.indexOf("d");
        d.y = a.indexOf("yyyy");
        d.h = a.indexOf("hh");
        d.i = a.indexOf("ii");
        this.initialMinute = this.initialHour = "00";
        e = ["y", "m", "d", "h", "i"];
        for (var f = ["currentYear", "currentMonth", "inputDay", "currentHour", "currentMinute"], g = [4, 2, 2, 2, 2], k = 0; k < e.length; k++) if (d[e[k]] >= 0) window[f[k]] = b.value.substr(d[e[k]], g[k]) / 1;
        currentMonth--
    } else
    {
        d = new Date;
        currentMonth = d.getMonth();
        currentYear = d.getFullYear();
        currentHour = "08";
        currentMinute = "00";
        inputDay = d.getDate() / 1
    }
    inputYear = currentYear;
    inputMonth = currentMonth;
    if (calendarDiv)
    {
        if (calendarDiv.style.display == "block")
        {
            closeCalendar();
            return false
        }
        writeCalendarContent()
    } else initCalendar();
    returnFormat = a;
    returnDateTo = b;
    positionCalendar(c);
    calendarDiv.style.visibility = "visible";
    calendarDiv.style.display = "block";
    if (iframeObj)
    {
        iframeObj.style.display = "";
        iframeObj.style.height = "140px";
        iframeObj.style.width = "195px";
        iframeObj2.style.display = "";
        iframeObj2.style.height = "140px";
        iframeObj2.style.width = "195px"
    }
    setTimeProperties();
    updateYearDiv();
    updateMonthDiv();
    updateMinuteDiv();
    updateHourDiv()
}

function displayCalendarSelectBox(b, a, c, d, e, f) {
    calendarDisplayTime = d ? true : false;
    currentMonth = a.options[a.selectedIndex].value / 1 - 1;
    currentYear = b.options[b.selectedIndex].value;
    if (d)
    {
        currentHour = d.options[d.selectedIndex].value;
        inputHour = currentHour / 1
    }
    if (e)
    {
        currentMinute = e.options[e.selectedIndex].value;
        inputMinute = currentMinute / 1
    }
    inputYear = b.options[b.selectedIndex].value;
    inputMonth = a.options[a.selectedIndex].value / 1 - 1;
    inputDay = c.options[c.selectedIndex].value / 1;
    calendarDiv ? writeCalendarContent() : initCalendar();
    returnDateToYear = b;
    returnDateToMonth = a;
    returnDateToDay = c;
    returnDateToHour = d;
    returnDateToMinute = e;
    returnDateTo = returnFormat = false;
    positionCalendar(f);
    calendarDiv.style.visibility = "visible";
    calendarDiv.style.display = "block";
    if (iframeObj)
    {
        iframeObj.style.display = "";
        iframeObj.style.height = calendarDiv.offsetHeight + "px";
        iframeObj.style.width = calendarDiv.offsetWidth + "px";
        iframeObj2.style.display = "";
        iframeObj2.style.height = calendarDiv.offsetHeight + "px";
        iframeObj2.style.width = calendarDiv.offsetWidth + "px"
    }
    setTimeProperties();
    updateYearDiv();
    updateMonthDiv();
    updateHourDiv();
    updateMinuteDiv()
}

function channelvnWather(b) {
    this.host = "http://weather.channelvn.net";
    this.storate = "http://dantri3.vcmedia.vn";
    this.script_folder = this.host + "/www/dantri";
    this.script_object = null;
    this.instance_name = b;
    this.CreateCssLink = function (a) {
        var c = document.createElement("link");
        c.type = "text/css";
        c.rel = "stylesheet";
        c.href = a;
        a = document.getElementsByTagName("head")[0];
        a.appendChild(c)
    };
    this.LoadData = function () {
        this.CreateScriptObject(this.host + "/ProxyHandler.ashx?MethodName=ChannelvnWeather&CallBack=" + this.instance_name + ".OnLoaded&RequestType=json")
    };
    this.InitScript = function () {
        var a = "";
        a += '<div id="divWeather"></div>';
        document.getElementById("divChannelvnWeather")
            .innerHTML = a
    };
    this.OnLoaded = function (a) {
        a = eval(a);
        var c = "";
        c += '<div class="tt-anh1">';
        c += '<span class="tt-title">' + a.ChannevnJSon.Weather[1].City_Name + "</span><br />";
        c += '<img src="' + this.storate + a.ChannevnJSon.Weather[1].CiTy_Images + '" alt="" /><span class="tt-temp">' + a.ChannevnJSon.Weather[1].City_Temp + "</span></div>";
        c += '<div class="tt-step1">';
        c += '<img  src="' + this.storate + '/App_Themes/Default/Images/thoitiet_step1.gif" /></div>';
        c += '<div class="tt-anh2">';
        c += '<span class="tt-title">' + a.ChannevnJSon.Weather[0].City_Name + "</span><br />";
        c += '<img src="' + this.storate + a.ChannevnJSon.Weather[0].CiTy_Images + '" alt="" /><span class="tt-temp">' + a.ChannevnJSon.Weather[0].City_Temp + "</span></div>";
        c += '<div class="tt-step2">';
        c += '<img width="100" src="' + this.storate + '/App_Themes/Default/Images/thoitiet_step1.gif" /></div>';
        c += '<div class="tt-anh3">';
        c += '<span class="tt-title">' + a.ChannevnJSon.Weather[2].City_Name + "</span><br />";
        c += '<img src="' + this.storate + a.ChannevnJSon.Weather[2].CiTy_Images + '" alt="" /><span class="tt-temp">' + a.ChannevnJSon.Weather[2].City_Temp + "</span></div>";
        document.getElementById("divWeather")
            .innerHTML = c
    };
    this.CreateScriptObject = function (a) {
        this.script_object != null && this.RemoveScriptObject();
        this.script_object = document.createElement("script");
        this.script_object.setAttribute("type", "text/javascript");
        this.script_object.setAttribute("src", a);
        a = document.getElementsByTagName("head")[0];
        a.appendChild(this.script_object)
    };
    this.RemoveScriptObject = function () {
        this.script_object.parentNode.removeChild(this.script_object);
        this.script_object = null
    }
}
if (document.getElementById("divChannelvnWeather"))
{
    var channelvn = new channelvnWather("channelvn");
    channelvn.InitScript();
    channelvn.LoadData()
}

function GoldInfo(b) {
    this.instanceName = b;
    this.host = "http://weather.channelvn.net";
    this.storate = "http://dantri3.vcmedia.vn";
    this.LoadData = function () {
        var a = "";

        a += '<div class="duongdaynong">H\u00e0 N\u1ed9i: <span>0973.567.567</span><br />TP HCM: <span>0974.567.567</span></div>';
        a += '<div class="tongbientap">T\u1ed5ng bi\u00ean t\u1eadp <span>Ph\u1ea1m Huy Ho\u00e0n</span></div>';
        $("#CafeF_ThoiTiet")
            .html(a);
        try
        {
            var c = this.storate;
            jQuery.getJSON(this.host + "/GoldInfoDojiHandler.ashx?callback=?",
            function (e) {
                html = "";
                t = 1;
                for (i = 0; i < e.objJson.length; i++)
                {
                    if (e.objJson[i].Type == "2")
                    {

                        giavang = e.objJson[i].Name;
                        buy = e.objJson[i].Value1;
                        sell = e.objJson[i].Value2;

                        html += '<span class="giavangloai' + t + '">' + giavang + "</span>";
                        html += '<span class="buy' + t + '">' + buy + "</span>";
                        html += '<span class="sell' + t + '">' + sell + "</span>";
                        t++;
                        if (t == 3) break;
                    }
                }

                html += '<a class="doji" href="http://doji.vn/" target="_blank" rel="nofollow"></a>';
                html += '<a class="tienphongbank" href="https://tpb.vn/" target="_blank" rel="nofollow"></a>';
                html += '<div class="duongdaynong">H\u00e0 N\u1ed9i: <span>0973.567.567</span><br />TP HCM: <span>0974.567.567</span></div>';
                html += '<div class="tongbientap">T\u1ed5ng bi\u00ean t\u1eadp <span>Ph\u1ea1m Huy Ho\u00e0n</span></div>';
                $("#CafeF_ThoiTiet")
                    .html(html)
            })
        } catch (d) { }
    };
    this.Innit = function () { }
}

function formatCurrency(b) {
    b = b.toString()
        .replace(/\$|\,/g, "");
    if (isNaN(b)) b = "0";
    sign = b == (b = Math.abs(b));
    b = Math.floor(b * 100 + 0.50000000001);
    cents = b % 100;
    b = Math.floor(b / 100)
        .toString();
    if (cents < 10) cents = "0" + cents;
    for (var a = 0; a < Math.floor((b.length - (1 + a)) / 3); a++) b = b.substring(0, b.length - (4 * a + 3)) + "." + b.substring(b.length - (4 * a + 3));
    return (sign ? "" : "-") + b
}
function FormatGoldNumber(b) {
    b = parseFloat(b.replace(',', '.'));
    return b = FormatNumber1(b, 2, ",", ".")
}

function FormatUSDNumber(b) {
    t = b.toString();
    if (t.length > 3)
    {
        h = t;
        t = "";
        for (j = 3; j < h.length; j += 3)
        {
            b = h.slice(h.length - j, h.length - j + 3);
            t = "." + b + t + ""
        }
        j = h.substr(0, h.length % 3 == 0 ? 3 : h.length % 3);
        t = j + t
    }
    return t
}

function FormatNumber1(b, a, c, d) {
    b = b.toFixed(a);
    b = b.toString();
    for (a = b.substr(b.length - a, a); a != "" && a.charAt(a.length - 1) == "0"; ) a = a.substr(0, a.length - 1);
    if (a != "") a = c + a;
    c = b.substr(0, b.length - 3);
    if (d != "" && c.length > 3)
    {
        h = c;
        c = "";
        for (j = 3; j < h.length; j += 3)
        {
            i = h.slice(h.length - j, h.length - j + 3);
            c = d + i + c + ""
        }
        j = h.substr(0, h.length % 3 == 0 ? 3 : h.length % 3);
        c = j + c
    }
    return b = c + a
}
if (document.getElementById("CafeF_ThoiTiet"))
{
    var divGoldInfo = new GoldInfo("CafeF_ThoiTiet");
    divGoldInfo.Innit();
    divGoldInfo.LoadData()
}

function openWindow(b, a, c) {
    var d = 0,
        e = 0;
    if (parseInt(navigator.appVersion) >= 4)
    {
        d = (screen.availWidth - a) * 0.5;
        e = (screen.availHeight - c) * 0.5
    }
    window.open(b, "", "scrollbars,resizable=yes,status=yes, width=" + a + ",height=" + c + ",left=" + d + ",top=" + e)
}

function TomorowDate() {
    var b = new Date;
    if (document.getElementById("currentDateViewByDate"))
    {
        DistributionDate = document.getElementById("currentDateViewByDate")
            .value;
        b = new Date(DistributionDate)
    }
    b = b.getTime();
    b = b + 864E5;
    b = new Date(b);
    b = b.getDate() + "-" + eval(eval(b.getMonth()) + 1) + "-" + b.getFullYear();
    var a = document.getElementById("hidZoneID"),
        c = document.getElementById("hidParentZoneID");
    location.href = "/" + c.value + "d" + a.value + "/" + b + ".htm"
}

function YesterDayDate() {
    var b = new Date;
    if (document.getElementById("currentDateViewByDate"))
    {
        DistributionDate = document.getElementById("currentDateViewByDate")
            .value;
        b = new Date(DistributionDate)
    }
    b = b.getTime();
    b = b - 864E5;
    b = new Date(b);
    b = b.getDate() + "-" + eval(eval(b.getMonth()) + 1) + "-" + b.getFullYear();
    var a = document.getElementById("hidZoneID"),
        c = document.getElementById("hidParentZoneID");
    location.href = "/" + c.value + "d" + a.value + "/" + b + ".htm"
}

function setHomepage() {
    if (document.all)
    {
        document.body.style.behavior = "url(#default#homepage)";
        document.body.setHomePage("http://dantri.com.vn")
    }
};