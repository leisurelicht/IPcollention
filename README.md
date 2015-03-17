# IPcollention

如果数据库存放中文出现乱码,解决方法有：

1.将get_util.php中的

    #mysql_query("set names 'utf8'");前面的#去掉。
  
2.在mysql数据库中输入下面的命令

    alter database ipsearch_db character set utf8;
    
设置所选数据库的编码格式为utf-8。
