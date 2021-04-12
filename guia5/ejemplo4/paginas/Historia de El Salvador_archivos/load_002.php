mw.loader.implement("jquery.tablesorter",function(){(function($,mw){var ts,parsers=[];function getParserById(name){var len=parsers.length;for(var i=0;i<len;i++){if(parsers[i].id.toLowerCase()===name.toLowerCase()){return parsers[i];}}return false;}function getElementSortKey(node){var $node=$(node),data=$node.data('sortValue');if(data!==null&&data!==undefined){return String(data);}else{if(node.tagName.toLowerCase()==='img'){return $node.attr('alt')||'';}else{return $.map($.makeArray(node.childNodes),function(elem){if(elem.nodeType===1){return getElementSortKey(elem);}else{return $.text(elem);}}).join('');}}}function getTextFromRowAndCellIndex(rows,rowIndex,cellIndex){if(rows[rowIndex]&&rows[rowIndex].cells[cellIndex]){return $.trim(getElementSortKey(rows[rowIndex].cells[cellIndex]));}else{return'';}}function detectParserForColumn(table,rows,cellIndex){var l=parsers.length,nodeValue,i=1,rowIndex=0,concurrent=0,needed=(rows.length>4)?5:rows.length;while(i<l){nodeValue=
getTextFromRowAndCellIndex(rows,rowIndex,cellIndex);if(nodeValue!==''){if(parsers[i].is(nodeValue,table)){concurrent++;rowIndex++;if(concurrent>=needed){return parsers[i];}}else{i++;rowIndex=0;concurrent=0;}}else{rowIndex++;if(rowIndex>rows.length){rowIndex=0;i++;}}}return parsers[0];}function buildParserCache(table,$headers){var rows=table.tBodies[0].rows,sortType,parsers=[];if(rows[0]){var cells=rows[0].cells,len=cells.length,i,parser;for(i=0;i<len;i++){parser=false;sortType=$headers.eq(i).data('sortType');if(sortType!==undefined){parser=getParserById(sortType);}if(parser===false){parser=detectParserForColumn(table,rows,i);}parsers.push(parser);}}return parsers;}function buildCache(table){var totalRows=(table.tBodies[0]&&table.tBodies[0].rows.length)||0,totalCells=(table.tBodies[0].rows[0]&&table.tBodies[0].rows[0].cells.length)||0,parsers=table.config.parsers,cache={row:[],normalized:[]};for(var i=0;i<totalRows;++i){var $row=$(table.tBodies[0].rows[i]),cols=[];if($row.hasClass(table
.config.cssChildRow)){cache.row[cache.row.length-1]=cache.row[cache.row.length-1].add($row);continue;}cache.row.push($row);for(var j=0;j<totalCells;++j){cols.push(parsers[j].format(getElementSortKey($row[0].cells[j]),table,$row[0].cells[j]));}cols.push(cache.normalized.length);cache.normalized.push(cols);cols=null;}return cache;}function appendToTable(table,cache){var row=cache.row,normalized=cache.normalized,totalRows=normalized.length,checkCell=(normalized[0].length-1),fragment=document.createDocumentFragment();for(var i=0;i<totalRows;i++){var pos=normalized[i][checkCell];var l=row[pos].length;for(var j=0;j<l;j++){fragment.appendChild(row[pos][j]);}}table.tBodies[0].appendChild(fragment);$(table).trigger('sortEnd.tablesorter');}function emulateTHeadAndFoot($table){var $rows=$table.find('> tbody > tr');if(!$table.get(0).tHead){var $thead=$('<thead>');$rows.each(function(){if($(this).children('td').length>0){return false;}$thead.append(this);});$table.find(' > tbody:first').before(
$thead);}if(!$table.get(0).tFoot){var $tfoot=$('<tfoot>');var len=$rows.length;for(var i=len-1;i>=0;i--){if($($rows[i]).children('td').length>0){break;}$tfoot.prepend($($rows[i]));}$table.append($tfoot);}}function buildHeaders(table,msg){var maxSeen=0,longest,realCellIndex=0,$tableHeaders=$('thead:eq(0) > tr',table);if($tableHeaders.length>1){$tableHeaders.each(function(){if(this.cells.length>maxSeen){maxSeen=this.cells.length;longest=this;}});$tableHeaders=$(longest);}$tableHeaders=$tableHeaders.children('th').each(function(index){this.column=realCellIndex;var colspan=this.colspan;colspan=colspan?parseInt(colspan,10):1;realCellIndex+=colspan;this.order=0;this.count=0;if($(this).is('.unsortable')){this.sortDisabled=true;}if(!this.sortDisabled){$(this).addClass(table.config.cssHeader).attr('title',msg[1]);}table.config.headerList[index]=this;});return $tableHeaders;}function isValueInArray(v,a){var l=a.length;for(var i=0;i<l;i++){if(a[i][0]===v){return true;}}return false;}function
setHeadersCss(table,$headers,list,css,msg,columnToHeader){$headers.removeClass(css[0]).removeClass(css[1]).attr('title',msg[1]);for(var i=0;i<list.length;i++){$headers.eq(columnToHeader[list[i][0]]).addClass(css[list[i][1]]).attr('title',msg[list[i][1]]);}}function sortText(a,b){return((a<b)?-1:((a>b)?1:0));}function sortTextDesc(a,b){return((b<a)?-1:((b>a)?1:0));}function multisort(table,sortList,cache){var sortFn=[];var len=sortList.length;for(var i=0;i<len;i++){sortFn[i]=(sortList[i][1])?sortTextDesc:sortText;}cache.normalized.sort(function(array1,array2){var col,ret;for(var i=0;i<len;i++){col=sortList[i][0];ret=sortFn[i].call(this,array1[col],array2[col]);if(ret!==0){return ret;}}return sortText.call(this,array1[array1.length-1],array2[array2.length-1]);});return cache;}function buildTransformTable(){var digits='0123456789,.'.split('');var separatorTransformTable=mw.config.get('wgSeparatorTransformTable');var digitTransformTable=mw.config.get('wgDigitTransformTable');if(
separatorTransformTable===null||(separatorTransformTable[0]===''&&digitTransformTable[2]==='')){ts.transformTable=false;}else{ts.transformTable={};var ascii=separatorTransformTable[0].split('\t').concat(digitTransformTable[0].split('\t'));var localised=separatorTransformTable[1].split('\t').concat(digitTransformTable[1].split('\t'));for(var i=0;i<ascii.length;i++){ts.transformTable[localised[i]]=ascii[i];digits.push($.escapeRE(localised[i]));}}var digitClass='['+digits.join('',digits)+']';ts.numberRegex=new RegExp('^('+'[-+\u2212]?[0-9][0-9,]*(\\.[0-9,]*)?(E[-+\u2212]?[0-9][0-9,]*)?'+'|'+'[-+\u2212]?'+digitClass+'+[\\s\\xa0]*%?'+')$','i');}function buildDateTable(){var regex=[];ts.monthNames={};for(var i=1;i<13;i++){var name=mw.config.get('wgMonthNames')[i].toLowerCase();ts.monthNames[name]=i;regex.push($.escapeRE(name));name=mw.config.get('wgMonthNamesShort')[i].toLowerCase().replace('.','');ts.monthNames[name]=i;regex.push($.escapeRE(name));}regex=regex.join('|');ts.dateRegex[0]=new
RegExp(/^\s*(\d{1,2})[\,\.\-\/'\s]{1,2}(\d{1,2})[\,\.\-\/'\s]{1,2}(\d{2,4})\s*?/i);ts.dateRegex[1]=new RegExp('^\\s*(\\d{1,2})[\\,\\.\\-\\/\'\\s]*('+regex+')'+'[\\,\\.\\-\\/\'\\s]*(\\d{2,4})\\s*$','i');ts.dateRegex[2]=new RegExp('^\\s*('+regex+')'+'[\\,\\.\\-\\/\'\\s]*(\\d{1,2})[\\,\\.\\-\\/\'\\s]*(\\d{2,4})\\s*$','i');}function explodeRowspans($table){$table.find('> tbody > tr > [rowspan]').each(function(){var rowSpan=this.rowSpan;this.rowSpan=1;var cell=$(this);var next=cell.parent().nextAll();for(var i=0;i<rowSpan-1;i++){var td=next.eq(i).children('td');if(!td.length){next.eq(i).append(cell.clone());}else if(this.cellIndex===0){td.eq(this.cellIndex).before(cell.clone());}else{td.eq(this.cellIndex-1).after(cell.clone());}}});}function buildCollationTable(){ts.collationTable=mw.config.get('tableSorterCollation');ts.collationRegex=null;if(ts.collationTable){var keys=[];for(var key in ts.collationTable){if(ts.collationTable.hasOwnProperty(key)){keys.push(key);}}if(keys.length){ts.
collationRegex=new RegExp('['+keys.join('')+']','ig');}}}function cacheRegexs(){if(ts.rgx){return;}ts.rgx={IPAddress:[new RegExp(/^\d{1,3}[\.]\d{1,3}[\.]\d{1,3}[\.]\d{1,3}$/)],currency:[new RegExp(/(^[£$€¥]|[£$€¥]$)/),new RegExp(/[£$€¥]/g)],url:[new RegExp(/^(https?|ftp|file):\/\/$/),new RegExp(/(https?|ftp|file):\/\//)],isoDate:[new RegExp(/^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}$/)],usLongDate:[new RegExp(/^[A-Za-z]{3,10}\.? [0-9]{1,2}, ([0-9]{4}|'?[0-9]{2}) (([0-2]?[0-9]:[0-5][0-9])|([0-1]?[0-9]:[0-5][0-9]\s(AM|PM)))$/)],time:[new RegExp(/^(([0-2]?[0-9]:[0-5][0-9])|([0-1]?[0-9]:[0-5][0-9]\s(am|pm)))$/)]};}function convertSortList(sortObjects){var sortList=[];$.each(sortObjects,function(i,sortObject){$.each(sortObject,function(columnIndex,order){var orderIndex=(order==='desc')?1:0;sortList.push([columnIndex,orderIndex]);});});return sortList;}$.tablesorter={defaultOptions:{cssHeader:'headerSort',cssAsc:'headerSortUp',cssDesc:'headerSortDown',cssChildRow:'expand-child',
sortInitialOrder:'asc',sortMultiSortKey:'shiftKey',sortLocaleCompare:false,parsers:{},widgets:[],headers:{},cancelSelection:true,sortList:[],headerList:[],selectorHeaders:'thead tr:eq(0) th',debug:false},dateRegex:[],monthNames:{},construct:function($tables,settings){return $tables.each(function(i,table){var $headers,cache,config,headerToColumns,columnToHeader,colspanOffset,$table=$(table),firstTime=true;if(!table.tBodies){return;}if(!table.tHead){emulateTHeadAndFoot($table);if(!table.tHead){return;}}$table.addClass('jquery-tablesorter');table.config={};config=$.extend(table.config,$.tablesorter.defaultOptions,settings);$.data(table,'tablesorter',{config:config});var sortCSS=[config.cssDesc,config.cssAsc];var sortMsg=[mw.msg('sort-descending'),mw.msg('sort-ascending')];$headers=buildHeaders(table,sortMsg);buildTransformTable();buildDateTable();buildCollationTable();cacheRegexs();function setupForFirstSort(){firstTime=false;var $sortbottoms=$table.find('> tbody > tr.sortbottom');if(
$sortbottoms.length){var $tfoot=$table.children('tfoot');if($tfoot.length){$tfoot.eq(0).prepend($sortbottoms);}else{$table.append($('<tfoot>').append($sortbottoms));}}explodeRowspans($table);table.config.parsers=buildParserCache(table,$headers);}headerToColumns=[];columnToHeader=[];colspanOffset=0;$headers.each(function(headerIndex){var columns=[];for(var i=0;i<this.colSpan;i++){columnToHeader[colspanOffset+i]=headerIndex;columns.push(colspanOffset+i);}headerToColumns[headerIndex]=columns;colspanOffset+=this.colSpan;});$headers.filter(':not(.unsortable)').click(function(e){if(e.target.nodeName.toLowerCase()==='a'){return true;}if(firstTime){setupForFirstSort();}cache=buildCache(table);var totalRows=($table[0].tBodies[0]&&$table[0].tBodies[0].rows.length)||0;if(!table.sortDisabled&&totalRows>0){this.order=this.count%2;this.count++;var cell=this;var columns=headerToColumns[this.column];var newSortList=$.map(columns,function(c){return[[c,cell.order]];});var i=columns[0];if(!e[config.
sortMultiSortKey]){config.sortList=newSortList;}else{if(isValueInArray(i,config.sortList)){for(var j=0;j<config.sortList.length;j++){var s=config.sortList[j],o=config.headerList[s[0]];if(isValueInArray(s[0],newSortList)){o.count=s[1];o.count++;s[1]=o.count%2;}}}else{config.sortList=config.sortList.concat(newSortList);}}setHeadersCss($table[0],$headers,config.sortList,sortCSS,sortMsg,columnToHeader);appendToTable($table[0],multisort($table[0],config.sortList,cache));return false;}}).mousedown(function(){if(config.cancelSelection){this.onselectstart=function(){return false;};return false;}});$table.data('tablesorter').sort=function(sortList){if(firstTime){setupForFirstSort();}if(sortList===undefined){sortList=config.sortList;}else if(sortList.length>0){sortList=convertSortList(sortList);}cache=buildCache(table);setHeadersCss(table,$headers,sortList,sortCSS,sortMsg,columnToHeader);appendToTable(table,multisort(table,sortList,cache));};if(config.sortList.length>0){setupForFirstSort();
config.sortList=convertSortList(config.sortList);$table.data('tablesorter').sort();}});},addParser:function(parser){var l=parsers.length,a=true;for(var i=0;i<l;i++){if(parsers[i].id.toLowerCase()===parser.id.toLowerCase()){a=false;}}if(a){parsers.push(parser);}},formatDigit:function(s){var out,c,p,i;if(ts.transformTable!==false){out='';for(p=0;p<s.length;p++){c=s.charAt(p);if(c in ts.transformTable){out+=ts.transformTable[c];}else{out+=c;}}s=out;}i=parseFloat(s.replace(/[, ]/g,'').replace('\u2212','-'));return isNaN(i)?0:i;},formatFloat:function(s){var i=parseFloat(s);return isNaN(i)?0:i;},formatInt:function(s){var i=parseInt(s,10);return isNaN(i)?0:i;},clearTableBody:function(table){$(table.tBodies[0]).empty();}};ts=$.tablesorter;$.fn.tablesorter=function(settings){return ts.construct(this,settings);};ts.addParser({id:'text',is:function(){return true;},format:function(s){s=$.trim(s.toLowerCase());if(ts.collationRegex){var tsc=ts.collationTable;s=s.replace(ts.collationRegex,function(
match){var r=tsc[match]?tsc[match]:tsc[match.toUpperCase()];return r.toLowerCase();});}return s;},type:'text'});ts.addParser({id:'IPAddress',is:function(s){return ts.rgx.IPAddress[0].test(s);},format:function(s){var a=s.split('.'),r='',l=a.length;for(var i=0;i<l;i++){var item=a[i];if(item.length===1){r+='00'+item;}else if(item.length===2){r+='0'+item;}else{r+=item;}}return $.tablesorter.formatFloat(r);},type:'numeric'});ts.addParser({id:'currency',is:function(s){return ts.rgx.currency[0].test(s);},format:function(s){return $.tablesorter.formatDigit(s.replace(ts.rgx.currency[1],''));},type:'numeric'});ts.addParser({id:'url',is:function(s){return ts.rgx.url[0].test(s);},format:function(s){return $.trim(s.replace(ts.rgx.url[1],''));},type:'text'});ts.addParser({id:'isoDate',is:function(s){return ts.rgx.isoDate[0].test(s);},format:function(s){return $.tablesorter.formatFloat((s!=='')?new Date(s.replace(new RegExp(/-/g),'/')).getTime():'0');},type:'numeric'});ts.addParser({id:'usLongDate',
is:function(s){return ts.rgx.usLongDate[0].test(s);},format:function(s){return $.tablesorter.formatFloat(new Date(s).getTime());},type:'numeric'});ts.addParser({id:'date',is:function(s){return(ts.dateRegex[0].test(s)||ts.dateRegex[1].test(s)||ts.dateRegex[2].test(s));},format:function(s){var match;s=$.trim(s.toLowerCase());if((match=s.match(ts.dateRegex[0]))!==null){if(mw.config.get('wgDefaultDateFormat')==='mdy'||mw.config.get('wgContentLanguage')==='en'){s=[match[3],match[1],match[2]];}else if(mw.config.get('wgDefaultDateFormat')==='dmy'){s=[match[3],match[2],match[1]];}else{return'99999999';}}else if((match=s.match(ts.dateRegex[1]))!==null){s=[match[3],''+ts.monthNames[match[2]],match[1]];}else if((match=s.match(ts.dateRegex[2]))!==null){s=[match[3],''+ts.monthNames[match[1]],match[2]];}else{return'99999999';}if(s[1].length===1){s[1]='0'+s[1];}if(s[2].length===1){s[2]='0'+s[2];}var y;if((y=parseInt(s[0],10))<100){if(y<30){s[0]=2000+y;}else{s[0]=1900+y;}}while(s[0].length<4){s[0]='0'
+s[0];}return parseInt(s.join(''),10);},type:'numeric'});ts.addParser({id:'time',is:function(s){return ts.rgx.time[0].test(s);},format:function(s){return $.tablesorter.formatFloat(new Date('2000/01/01 '+s).getTime());},type:'numeric'});ts.addParser({id:'number',is:function(s){return $.tablesorter.numberRegex.test($.trim(s));},format:function(s){return $.tablesorter.formatDigit(s);},type:'numeric'});}(jQuery,mediaWiki));;},{"css":[
"table.jquery-tablesorter th.headerSort{background-image:url(data:image/gif;base64,R0lGODlhFQAJAIABAAAAAAAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjAxODAxMTc0MDcyMDY4MTE4OEM2REYyN0ExMDhBNDJFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjdCNTAyODcwMEY4NjExRTBBMzkyQzAyM0E1RDk3RDc3IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjdCNTAyODZGMEY4NjExRTBBMzkyQzAyM0E1RDk3RDc3IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgTWFjaW50b3NoIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDE4MDExNzQwNzIwNjgxMTg4QzZERjI3QTEwOEE0MkUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDE4MDExNzQwNzIwNjgxMTg4QzZERjI3QTEwOEE0MkUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4B//79/Pv6+fj39vX08/Lx8O/u7ezr6uno5+bl5OPi4eDf3t3c29rZ2NfW1dTT0tHQz87NzMvKycjHxsXEw8LBwL++vby7urm4t7a1tLOysbCvrq2sq6qpqKempaSjoqGgn56dnJuamZiXlpWUk5KRkI+OjYyLiomIh4aFhIOCgYB/fn18e3p5eHd2dXRzcnFwb25tbGtqaWhnZmVkY2JhYF9eXVxbWllYV1ZVVFNSUVBPTk1MS0pJSEdGRURDQkFAPz49PDs6OTg3NjU0MzIxMC8uLSwrKikoJyYlJCMiISAfHh0cGxoZGBcWFRQTEhEQDw4NDAsKCQgHBgUEAwIBAAAh+QQBAAABACwAAAAAFQAJAAACF4yPgMsJ2mJ4VDKKrd4GVz5lYPeMiVUAADs=);background-image:url(//bits.wikimedia.org/static-1.21wmf10/resources/jquery/images/sort_both.gif?2013-02-18T16:53:20Z)!ie;cursor:pointer;background-repeat:no-repeat;background-position:center right;padding-right:21px}table.jquery-tablesorter th.headerSortUp{background-image:url(data:image/gif;base64,R0lGODlhFQAEAIABAAAAAAAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjAzODAxMTc0MDcyMDY4MTE4OEM2REYyN0ExMDhBNDJFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjdCNTAyODc0MEY4NjExRTBBMzkyQzAyM0E1RDk3RDc3IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjdCNTAyODczMEY4NjExRTBBMzkyQzAyM0E1RDk3RDc3IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgTWFjaW50b3NoIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDM4MDExNzQwNzIwNjgxMTg4QzZERjI3QTEwOEE0MkUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDM4MDExNzQwNzIwNjgxMTg4QzZERjI3QTEwOEE0MkUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4B//79/Pv6+fj39vX08/Lx8O/u7ezr6uno5+bl5OPi4eDf3t3c29rZ2NfW1dTT0tHQz87NzMvKycjHxsXEw8LBwL++vby7urm4t7a1tLOysbCvrq2sq6qpqKempaSjoqGgn56dnJuamZiXlpWUk5KRkI+OjYyLiomIh4aFhIOCgYB/fn18e3p5eHd2dXRzcnFwb25tbGtqaWhnZmVkY2JhYF9eXVxbWllYV1ZVVFNSUVBPTk1MS0pJSEdGRURDQkFAPz49PDs6OTg3NjU0MzIxMC8uLSwrKikoJyYlJCMiISAfHh0cGxoZGBcWFRQTEhEQDw4NDAsKCQgHBgUEAwIBAAAh+QQBAAABACwAAAAAFQAEAAACDYwfoAvoz9qbZ9FrJC0AOw==);background-image:url(//bits.wikimedia.org/static-1.21wmf10/resources/jquery/images/sort_up.gif?2013-02-18T16:53:20Z)!ie}table.jquery-tablesorter th.headerSortDown{background-image:url(data:image/gif;base64,R0lGODlhFQAEAIABAAAAAAAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjAyODAxMTc0MDcyMDY4MTE4OEM2REYyN0ExMDhBNDJFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjhFNzNGQjI3MEY4NjExRTBBMzkyQzAyM0E1RDk3RDc3IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjhFNzNGQjI2MEY4NjExRTBBMzkyQzAyM0E1RDk3RDc3IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgTWFjaW50b3NoIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDI4MDExNzQwNzIwNjgxMTg4QzZERjI3QTEwOEE0MkUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDI4MDExNzQwNzIwNjgxMTg4QzZERjI3QTEwOEE0MkUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4B//79/Pv6+fj39vX08/Lx8O/u7ezr6uno5+bl5OPi4eDf3t3c29rZ2NfW1dTT0tHQz87NzMvKycjHxsXEw8LBwL++vby7urm4t7a1tLOysbCvrq2sq6qpqKempaSjoqGgn56dnJuamZiXlpWUk5KRkI+OjYyLiomIh4aFhIOCgYB/fn18e3p5eHd2dXRzcnFwb25tbGtqaWhnZmVkY2JhYF9eXVxbWllYV1ZVVFNSUVBPTk1MS0pJSEdGRURDQkFAPz49PDs6OTg3NjU0MzIxMC8uLSwrKikoJyYlJCMiISAfHh0cGxoZGBcWFRQTEhEQDw4NDAsKCQgHBgUEAwIBAAAh+QQBAAABACwAAAAAFQAEAAACDYyPAcmtsJyDVDKKWQEAOw==);background-image:url(//bits.wikimedia.org/static-1.21wmf10/resources/jquery/images/sort_down.gif?2013-02-18T16:53:20Z)!ie}\n/* cache key: eswiki:resourceloader:filter:minify-css:7:3b8606ead8e89c82d409883f2af675fc */"
]},{"sort-descending":"Orden descendente","sort-ascending":"Orden ascendente"});
/* cache key: eswiki:resourceloader:filter:minify-js:7:00fd4fcf98bb3d7cd30174ea820504de */