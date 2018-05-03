export function formatDate (date, fmt) {
  if (/(y+)/.test(fmt)) {
    // $1是正则表达式的属性缩写 ,指的是与正则表达式匹配的第一个 子匹配(以括号为标志)字符串
    // replace 字符串的替换，这里的作用的把传过来的模式'yyyy-MM-dd hh:mm'的第一个子匹配yyyy替换成后面的值
    // date.getFullYear()是获取年份，+''则把它转化为字符串
    // substr 字符串的截取，传入两个参数，这里只传入一个，则是必须的参数，即从哪里开始截取，没有传入第二个参数length则代表截取到末尾
    // 这里把字符串年份从头到尾再截取一次，不知道有啥用……
    fmt = fmt.replace(RegExp.$1, (date.getFullYear() + '').substr(4 - RegExp.$1.length))
  }
  let o = {
    'M+': date.getMonth() + 1,
    'd+': date.getDate(),
    'h+': date.getHours(),
    'm+': date.getMinutes(),
    's+': date.getSeconds()
  }
  for (let k in o) {
    // 加括号是为了在正则表达式中捕获子匹配，这样才能在下面才能用到RegExp.$1
    // k为o对象的属性名
    if (new RegExp(`(${k})`).test(fmt)) {
      // str为o对象的属性值，转为字符串
      let str = o[k] + ''
      // 这里的RegExp.$1是属性名 即是MM dd hh mm ss 所以他们的长度必然都是2
      // 所以这里都会走padLeftZero这个函数……
      fmt = fmt.replace(RegExp.$1, (RegExp.$1.length === 1) ? str : padLeftZero(str))
    }
  }
  return fmt
}
function padLeftZero (str) {
  // 这里首先是字符串的拼接，如果是各位数则拼成三位数 如果是两位数，则拼成四位数关键在于后面的字符串的截取
  // 字符串截取的开始位置为str的长度，一直截取到末尾。如果是个位数则截取到一个零加上str 如果是双位数，则不会截取到零
  return ('00' + str).substr(str.length)
}
