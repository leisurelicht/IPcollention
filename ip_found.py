# -*- coding=utf-8 -*- 
import sys
import urllib2
import urllib
import os
from bs4 import BeautifulSoup


#为了解决编码错误问题
reload(sys)   
sys.setdefaultencoding('utf8')

# target url
url = "http://hd2001562.ourhost.cn/"


send_hearders = {  #构造包头
'Host' : 'hd2001562.ourhost.cn',
'User-Agent' : 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:35.0) Gecko/20100101 Firefox/35.0',
'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
'Connection' : 'keep-alive',
}

data = { #传递数据
'str' : '0,0,0,0',
'ipk': 'b',
'Submit' : '批量查IP'  
}

  

def ip_found(ip): 
    data['str'] = ip
    url_values = urllib.urlencode(data)
    req = urllib2.Request(url,url_values,send_hearders)
    temp = urllib2.urlopen(req)
    html = temp.read()
    soup = BeautifulSoup(html)
    tag = soup.p.p
    tmp = tag.get_text()
    #print tmp
    tar = tmp.partition('#')
    #fp = open ('ip.txt','a')
    #fp.write(tar[0]+' '+tar[2]+'\n')
    print tar[2]
if __name__ == "__main__":
    ip_found(sys.argv[1])
  
