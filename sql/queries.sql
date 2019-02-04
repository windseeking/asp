USE asp;

INSERT INTO partners (name, description, image_path, link)
VALUES  (
          'Kuzminsky & Partners Law firm',
          'An independent Ukrainian law firm, which provides legal services to Ukrainian and international businesses. ',
          'http://www.suomipartnership.org/pics/kuzminsky.png',
          'http://kuzminskypartners.com/'
        ),
        (
          'Avista accounting company',
          'An audit and consulting firm (USREOU 25418670) that successfully helps companies solve problems in audit and consulting since 1998.',
          'http://www.suomipartnership.org/pics/avista.jpg',
          'http://avista-audit.com/indexEngl'
        );

INSERT INTO members (name, address, phone, email, activities, image_path, website)
VALUES  (
            'SUOMI PARTNERSHIP CONSULTING LLC',
            'Uspenska str. 26, 65014, Odesa, Ukraine',
            '+38 048 728 74 02',
            'sakara@te.net.ua',
            'Management and related consulting',
            'http://www.suomipartnership.org/pics/SPC.png',
            'http://suomipartnership.com/'
        ),
        (
            'KATRAN-SB LLC',
            '16A, Kiyashko St., 69015, Zaporizhzhya, Ukraine',
            '+38 0612 83 19 48',
            'katransb@ukr.net',
            'Security services',
            'http://www.suomipartnership.org/pics/Katran1.jpg',
            'http://www.katransb.com.ua/'
        ),
        (
            'TRANS-LOGISTIC LLC',
            '16A, Kiyashko St., 69015, Zaporizhzhya, Ukraine',
            '+38 0612 89 51 86',
            'trans_logistic@ukr.net',
            'Cargo road transportation',
            '',
            'http://trans-logistics.com.ua'
        ),
        (
            'CRANEDESIGN LLC',
            '16A, Kiyashko St., 69015, Zaporizhzhya, Ukraine',
            '+38 0612 89 51 86',
            'yevgen.minenkov.ext@konecranes.com',
            'Engineering services, designing of cranes',
            'http://www.suomipartnership.org/pics/Cranedesign1.jpg',
            ''
        ),
        (
            'TECHINSIGHT CO. LTD',
            'Bazarna str. 18, kv. 12, 65014, Odesa, Ukraine',
            '+38 048 234 92 77',
            'maxy@techinsight.com.ua',
            'IT services',
            '',
            'http://www.techinsight.com.ua/'
        ),
        (
            'KRAN LTD',
            'Ladozka 14, kv. 120, 69096, Zaporizhzhya, Ukraine',
            '+38 0612 83 18 48',
            'ooo.pp.kran.ltd@mail.ru',
            'Repair and maintenance of electric equipment',
            'http://www.suomipartnership.org/pics/Kran.jpg',
            'http://kran-ltd.at.ua/'
        ),
        (
            'LLC «Tehnolitinvest»',
            'Kyoashka str. 16-a, 69015, Zaporizhzhya, Ukraine',
            '+38 099 213 78 34',
            'technolitinvest@mail.ru',
            'Management and related consulting',
            '',
            'Steel structure production'
        ),
        (
          'LLC «EURO Machinery»',
          'Kyoashka str. 16-a, 69015, Zaporizhzhya, Ukraine',
          '+38 097 590 24 84',
          'euro-machinery@mail.ru ',
          'Sale and maintenance of industrial equipment and machines. Sale of metal cutting instru',
          '',
          'http://euro-machinery.com.ua'
        ),
        (
          'LLC «InterKranProject»',
          'Odessa, Ukraine',
          '+38 048 778 19 90',
          'technolitinvest@mail.ru',
          'Engineering, all kinds of site works.',
          '',
          ''
        );

INSERT INTO news (title, text, cat, image_path)
VALUES  (
        'Visit Finland',
        'In May 2017, the Association organized a visit of representatives of enterprises participating of the SPA to
        Reijola (Finland) on the Pekotek company. Ukrainian entrepreneurs had an opportunity to get acquainted with the
        technologies and management principles of one of the largest manufacturer of shot blasting and painting equipment.',
        'finnish-ukrainian',
        'https://d34ip4tojxno3w.cloudfront.net/app/uploads/Finland_Husky_Ranch_Lapland-400x300.jpg'
        ),
        (
        'Nordic Business Day 2013',
        'On March 5, 2013 the ASP management participated in the Nordic Business Day 2013. This is a forum of businesses
        from 5 Nordic countries: Denmark, Sweden, Norway, Iceland and Finland. The current economic situation in Ukraine
        as well as obstacles for foreign investments in Ukraine had been discussed. The ASP management had a meeting with
        the Finnish Ambassador in Ukraine ms. Arja Makkonen and discussed her scheduled visit to Odesa.',
        'asp',
        'http://www.nbforum.com/app/uploads/nbf-some-img.png'
        ),
        (
        'New Horizons',
        'We are pleased to inform you that in May 2017 Euro Machinery Ltd signed a partnership agreement as an agent with
        Pekotek (Finland), which specializes in the development and production of shot blasting, painting and other equipment.',
        'members',
        'http://www.kigo.gr/images/dealer/pekotek.png'
        ),
        (
        '5 new members have joined the Association',
        'On February 11, 2013 the general meeting of ASP accepted the following companies as the new members of ASP:<br>
        TECHINSIGHT CO. LTD<br>
        TRANS-LOGISTIC LLC<br>
        KATRAN-SB LLC<br>
        CRANEDESIGN LLC<br>
        KRAN LTD.<br>
        Our greetings to the new members!',
        'asp',
        ''
        ),
        (
        '«EURO Machinery» LLC distribution and partnership agreement',
        'April 2017.Our company has signed distribution agreement with Suomen Keskusvarikko Oy. This will give new
        opportunities for mutually beneficial cooperation of each company. May 2017. LLC “Euro Machinery” discussed with
        Pekotek Oy and agreed to be a local partner.',
        'members',
        'http://www.tuoficinaenvalladolid.com/wp/wp-content/uploads/2016/10/Euromachinery.jpg'
        ),
        (
        'Hyvää joulua aja onnellista uutta vuotta!',
        'On behalf of Suomi Partnership Association we wish you Merry Christmas and Happy New Year!',
        'finnish-ukrainian',
        'https://www.stickerforwall.com/29335-thickbox/stickers-merry-christmas-happy-new-year.jpg'
        ),
        (
        'Tehnolitinvest sertification ISO 9001',
        'October 24, 2016 on the results of the certification audit, the company «Bureau Veritas» recommended Company
         Tehnolitinvest to obtain the certificate for compliance with international standard ISO 9001.',
        'members',
        ''
        ),
        (
        'Suomi Partnership Association participates in humanitarian aid delivery',
        'During the difficult for Ukraine 2014 & 2015 years Suomi Partnership Association had been dealing with unusual
        activities as to original purpose of Association. We assisted in delivery of humanitarian aid from Finland to Ukraine.',
        'finnish-ukrainian',
        ''
        );

