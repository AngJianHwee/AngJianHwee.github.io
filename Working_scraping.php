<?php include 'header.php';?>

```python
import urllib
x = urllib.request.urlopen('http://data.pr4e.org/romeo.txt')
vars(x)
```




    {'fp': <_io.BufferedReader name=1284>,
     'debuglevel': 0,
     '_method': 'GET',
     'headers': <http.client.HTTPMessage at 0x6712100>,
     'msg': 'OK',
     'version': 11,
     'status': 200,
     'reason': 'OK',
     'chunked': False,
     'chunk_left': 'UNKNOWN',
     'length': 167,
     'will_close': True,
     'code': 200,
     'url': 'http://data.pr4e.org/romeo.txt'}



# Coursera


```python
import pandas as pd
import numpy as np
import Working_scrapeClass
from time import sleep
from random import randint

a = Working_scrapeClass.scrapeSelenium()
a.initializeDriver(headless=False,without_image=False)
i = 1

URL = "https://www.coursera.org/specializations/aml"
BASE = URL[:URL.find('/',9)]
a.setupReCaptcha()

a.get(URL)

from json import dumps,load,loads
a.driver.delete_all_cookies()
# with open('COOKIE_COURSERA.txt','r') as cookief:
with open('COOKIE_COURSERA_Kelvin.txt','r') as cookief:
    cookieslist = load(cookief)
    for cookie in cookieslist:
        a.driver.add_cookie(cookie)

a.get(URL)

```


```python
from json import dumps,load,loads
with open('COOKIE_COURSERA.txt','w') as cookief:
# with open('COOKIE_COURSERA_Kelvin.txt','w') as cookief:
    cookief.write(dumps(a.driver.get_cookies()))
```


```python
# Course page
def apply():
    a.driver.find_element_by_xpath("//button[@class='button-link finaid-link']").click()
    a.driver.find_element_by_xpath("//button[@class='button-link body-1-text']").click()

#### Financial Aid
# We're proud to offer a financial aid program that helps people access the skills they want to learn. Our program was created to help those who can't afford to pay for a course on their own.
def financialAid():
    a.driver.find_element_by_xpath("//input[@id='info_checkbox']").click()
    a.driver.find_element_by_xpath("//input[@id='completion_checkbox']").click()
    a.driver.find_element_by_xpath("//input[@id='accept-terms-field']").send_keys("I agree to the terms above")
    a.driver.find_element_by_xpath("//div[@class='continue-button-container vertical-box align-items-absolute-center']").click()
    Working_scrapeClass.time.sleep(Working_scrapeClass.randint(3,7))
    
#### Background Information
def background(case=0):
    from selenium.webdriver.support.ui import Select
    Select(a.driver.find_element_by_xpath("//select[@id='finaid-educationalBackground']")).select_by_visible_text('College degree')
    a.driver.find_element_by_xpath("//input[@id='finaid-income']").send_keys("0")
    Select(a.driver.find_element_by_xpath("//select[@id='finaid-employmentStatus']")).select_by_visible_text('Student')
    a.driver.find_element_by_xpath("//input[@id='finaid-amount-can-pay']").send_keys(0)
    a.driver.find_element_by_xpath("//input[@id='would-not-take-loan']").click()        
    
    if case == 0:
        a.driver.find_element_by_xpath("//textarea[@id='finaid-reason']").send_keys("I am a student from Malaysia and currently studying in Macau with CGPA 3.8 with a full scholarship. Unfortunately, any sort of Internship and part-time by a foreign student is illegal here at Macau so I could not attain any sort of income. There are some limited student helper positions in the university that are legal and I had applied and had been accepted to work for them. However, there is a working hour limit of 72 hours per month and I always max out the limit. The living cost in Macau is very high so almost all of my income is used to pay rent, food, and utilities. I intended to complete the whole course for later application for Master in Georgia Tech after my Bachelor Degree. One of my parents had retired and the other one is low income especially during the pandemic. In a developing country, I totally understand and respect the cost of preparing a course and am willing to pay for the copyright and work but the price is just too high for me. I would be very grateful if I could get financial assistance offered by coursera to register for the course and get a certificate for the program.")        
        a.driver.find_element_by_xpath("//textarea[@id='finaid-goal']").send_keys("I am currently a math degree student minor in Data Science and would like to become a Data Scientist in the future. Due to my current household financial status, I decided to start working after my Bachelor's Degree and pursue my Master's Degree at the same time. After weeks of searching through the internet, I decided to enroll in the Georgia Tech Online Master in Computer Science program, which is the cheapest program from a reputable university. However the course design in my university for Data Science is heavily math-based, therefore I decided to enroll in high-level courses about data science online to strengthen my CS background. I am preparing myself for a Master in Computer Science at Georgia Tech with a specialization in Data Science and this course will help for applying for the program. There are some courses offered in my current university but due to the school's policy, I am not eligible to enroll in any of them. Therefore, I would like to enroll in this course and I firmly believe enrolling in this course will help in both my career and my application. I am also applying for some freelance jobs online as part-time working is illegal and having this course on my resume will help in my career, which will enable me to purchase other courses on coursera.")
        a.driver.find_element_by_xpath("//textarea[@id='finaid-loanReason']").send_keys("One of my parents had retired and the other one is low income especially during the pandemic. I am very serious about my financial status and I do not think it will be a good idea to take a loan even with low-interest as it would be spending my future income, which is quite risky for a student who have not graduated from college and get a job yet.")
    elif case == 1:
        a.driver.find_element_by_xpath("//textarea[@id='finaid-reason']").send_keys("I am a student from Malaysia and currently studying in Macau with CGPA 3.8 with a full scholarship. Unfortunately, any sort of Internship and part-time by a foreign student is illegal here at Macau so I could not attain any sort of income. There are some limited student helper positions in the university that are legal and I had applied and had been accepted to work for them. However, there is a working hour limit of 72 hours per month and I always max out the limit. The living cost in Macau is very high so almost all of my income is used to pay rent, food, and utilities. I intended to complete the whole course for later application for Master in Georgia Tech after my Bachelor Degree. One of my parents had retired and the other one is low income especially during the pandemic. In a developing country, I totally understand and respect the cost of preparing a course and am willing to pay for the copyright and work but the price is just too high for me. I would be very grateful if I could get financial assistance offered by coursera to register for the course and get a certificate for the program.")        
        a.driver.find_element_by_xpath("//textarea[@id='finaid-goal']").send_keys("I am currently a math degree student minor in Data Science and would like to become a Data Scientist in the future. Due to my current household financial status, I decided to start working after my Bachelor's Degree and pursue my Master's Degree at the same time. After weeks of searching through the internet, I decided to enroll in the Georgia Tech Online Master in Computer Science program, which is the cheapest program from a reputable university. However the course design in my university for Data Science is heavily math-based, therefore I decided to enroll in high-level courses about data science online to strengthen my CS background. I am preparing myself for a Master in Computer Science at Georgia Tech with a specialization in Data Science and this course will help for applying for the program. There are some courses offered in my current university but due to the school's policy, I am not eligible to enroll in any of them. Therefore, I would like to enroll in this course and I firmly believe enrolling in this course will help in both my career and my application. I am also applying for some freelance jobs online as part-time working is illegal and having this course on my resume will help in my career, which will enable me to purchase other courses on coursera.")
        a.driver.find_element_by_xpath("//textarea[@id='finaid-loanReason']").send_keys("One of my parents had retired and the other one is low income especially during the pandemic. I am very serious about my financial status and I do not think it will be a good idea to take a loan even with low-interest as it would be spending my future income, which is quite risky for a student who have not graduated from college and get a job yet.")
    elif case == 2:
        a.driver.find_element_by_xpath("//textarea[@id='finaid-reason']").send_keys("I am a resident of India. My father is a daily wage labourer and mother is a housewife. Our annual income is pretty low wrt to the average nation’s income. I think it will be beneficial for me to get into the firm as an intern. But I’ve no job of my own to carry the expanses to pay for the certificate of this course. I live only for my scholarship. In this circumstance, it is very much difficult for me to gather such amount of money for the certificate. Financial Aid will help me take this course without any adverse impact on my monthly essential needs. So I’m badly in need of this financial aid. Receiving this Financial Aid will open for me a new horizon of the world of Coursera courses, which in turn will help me in future. I also plan to complete all assignments on or before time as I have done in previous Signature Track Courses. Also, I intend to participate in Discussion Forums, which I have found to supplement my learning immensely in the other online courses I have taken on Coursera. I also plan to grade assignments, which are to peer-reviewed, which I believe will an invaluable learning opportunity.")
        a.driver.find_element_by_xpath("//textarea[@id='finaid-goal']").send_keys("I want to take this course as I want to learn Data science. I want to complete the course due to my curiosity and also that I can put a good CV to get applied to a job. This course will boost my job prospects after graduation from my institute. It will help perform better in carrying out various programs in a computer language and give me an edge over my competitors. A verified certificate will attach credibility to the certificate I receive from this course. The field of software technology is becoming saturated, and industries are now placing a high level of importance on specialisation. This course is suggested by one of my seniors. I'm a junior in college and form next semester I have my placement pool. Getting certification on this course not only help me to stand out among thousands but also help my resume get shortlisted and get high pay job as top companies are using data science and it has been said that up to 2020 the world will be going to generate 50 times more data than what generated in 2011, so many companies are looking for Data Scientists. There is a lot of potential and scope in this career opportunity.")
        a.driver.find_element_by_xpath("//textarea[@id='finaid-loanReason']").send_keys("Sir, the financial status of the family, is not too good to pay the loan amount. We already have a lot of dept in the bank, and my parents are paying it regularly. It would make their life even harder to add a new loan over them. Sir, I don't want to put any pressure over them. Sir, it would be a great help for me to get a good job and help my family if I'm able to get this course.")
        a.refreshTree()
    sleep(15)

def submmit():
    try:
        a.driver.find_element_by_xpath("//section[@class='rc-FinaidApplicationSection dark-background horizontal-box align-items-absolute-center']").click()
    except:
        pass
    a.driver.switch_to.frame(a.driver.find_element_by_xpath("//iframe[@title='recaptcha challenge expires in two minutes']"))
    a.driver.find_element_by_xpath("//div[@class='button-holder help-button-holder']").click()
    a.driver.switch_to.default_content()
    
```


```python
def try_function(func,count=5,case=0):
    for i in range(count):
        try:
            if case:
                func(case)
            else:
                func()
            print(f"{func} Breaked")
            break
        except Exception as e:
            print(func,e)
            sleep(randint(2,4))
    sleep(randint(2,4))    
```


```python
try_function(apply)
try_function(financialAid)
try_function(background,case = 2)
```

    <function apply at 0x005ADE38> Breaked
    <function financialAid at 0x005ADE80> Breaked
    Refreshed Tree.
    
    <function background at 0x05998100> Breaked
    


```python
try_function(submmit,20)
```


```python
a.refreshTree()
a.tree.xpath("//textarea[@id='finaid-loanReason']/text()")[0] != "One of my parents had retired and the other one is low income especially during the pandemic. I am very serious about my financial status and I do not think it will be a good idea to take a loan even with low-interest as it would be spending my future income, which is quite risky for a student who have not graduated from college and get a job yet."
```


```python
try_function(submmit,20)
```

# EDX


```python
import pandas as pd
import numpy as np
import Working_scrapeClass
from time import sleep

a = Working_scrapeClass.scrapeSelenium()
a.initializeDriver(headless=False,without_image=False)
i = 1

URL = "https://courses.edx.org/dashboard"
BASE = URL[:URL.find('/',9)]
a.setupReCaptcha()

a.get(URL)

from json import dumps,load,loads
a.driver.delete_all_cookies()
# with open('COOKIE_COURSERA.txt','r') as cookief:
with open('COOKIE_EDX_Kelvin.txt','r') as cookief:
    cookieslist = load(cookief)
    for cookie in cookieslist:
        a.driver.add_cookie(cookie)

a.get(URL)
a.get("https://courses.edx.org/financial-assistance/apply/")

```


```python
from json import dumps,load,loads
with open('COOKIE_EDX_Kelvin.txt','w') as cookief:
# with open('COOKIE_COURSERA_Kelvin.txt','w') as cookief:
    cookief.write(dumps(a.driver.get_cookies()))
```


```python
text1 = '''My name is Kelvin Liew. I am in need of financial assistance in order to attend edx course because I am a low-income student. I am the 1st child to attend the college. Although my parents gave me many supports, I received a limited financial assistance due to low family income. To reduce family burden, I took out student loans to pay for my tuitions. Meanwhile, I am working 19 hours per week on campus to support myself. However, with the increasing tuitions this year, I am facing more challenges on financial need. As a math student, I wish to spend more time on my major courses because these courses are cores of my major and crucial in my future career. Unfortunately, financial burden may lessen my time on mastering the courses. Therefore, I would greatly appreciate a helping hand so that I can successfully obtain this course.\n\nAwarding this scholarship will make great contribution to complete this courses. This scholarship would allow me to work less and focus more on my studies. Meanwhile, this scholarship will support me to do more on community service and explore my potential in assisting the needs of people. Furthermore, receiving this scholarship will give me more opportunities to attend the conference and expose to newly developed technology. Additionally, awarding this scholarship would further motivate me to pursue academic excellence.\n\nI shall be thankful to you for this act of kindness.\n\nKelvin Liew.'''
text2 = '''I specialize in the field of structural Engineering combined with strong (civil and earthquake) engineering background to help organization implement construction technologies to achieve their technology and goals.\n\nI am very passionate about teaching and how it can be successfully implemented and managed to help organizations become more efficient and effective. Teaching requires a strong understanding of both technical and practices ( learning as well as communication Skills) . I am currently pursuing a master degree with concentration on structural engineering to acquire a broad range of tall buildings and earthquake resistance structure. I am also engaging in some self online learning courses outside the classroom and participating in couple of certificate programs so that they can help me on teaching. Although I am very committed to undertaking professional trainings to fulfill my goals, the expensive cost of some online courses and certification programs had hold me back from taking them.\n\nThis scholarship will certainly strengthen my opportunity to take multiple online courses and certification programs which I was not able to pay for due to my financial burden. The scholarship can help me further my professional training and certification goals that I have set for myself and will in turn help me start a true career in the field of structural engineering as a teacher. This Scholarship can also be used to assist me pay for my courses this coming spring. Overall, this scholarship will help me accomplish my current goal, move on to the next and eventfully become a successful professional in the teaching field.\n\nI believe my education and experience fits nicely with the scholarship requirements, and I am certain that this scholarship will make a significant contribution to my continuing education.\n\nKelvin Liew.'''
text3 = '''I plan to complete all assignments on or before time. Also, I intend to participate in Discussion Forums, which I have found to supplement my learning immensely in the other online courses I have taken on edX. I am pursuing graduation in structural engineering. Also, I have a keen interest in teaching as well as learning new things. I want to complete the course due to my curiosity and also that I can put a good CV to get applied to a teaching job. This course will boost my job prospects after graduation from my institute. It will help perform better in carrying out in the field of teaching. A verified certificate will attach credibility to the certificate I receive from this course. I plan to complete all assignments on or before time. Also, I intend to participate in Discussion Forums, which I have found to supplement my learning immensely in the other online courses I have taken on edX I also plan to grade assignments that are to peer-reviewed which I believe will an invaluable learning opportunity. I will do the course modules daily and try to complete the course before the deadlines specified. I will also introduce this course from Harvard to my friends as many of them are very interested in Computer Science. I will do my best in this course to boost my knowledge in Computer Science.\n\nKelvin Liew.'''
a.driver.find_element_by_xpath("//*[@id='financial-assistance-reason_for_applying']").send_keys(text1)
a.driver.find_element_by_xpath("//*[@id='financial-assistance-goals']").send_keys(text2)
a.driver.find_element_by_xpath("//*[@id='financial-assistance-effort']").send_keys(text3)
a.driver.find_element_by_xpath("//*[@id='content']/div/form/div[9]/button").click()

```

# mjj


```python
import pandas as pd
import numpy as np
import Working_scrapeClass
from time import sleep

a = Working_scrapeClass.scrapeSelenium()
a.initializeDriver(headless=False,without_image=False)
i = 1

URL = "https://mail.mjj.edu.ge/"
BASE = URL[:URL.find('/',9)]
a.setupReCaptcha()

a.get(URL)
```


```python
email = ""
while email == "":
    try:
        a.refreshTree()
        email = a.tree.xpath("/html/body/div[1]/div/div[2]/button/i/@data-clipboard-text")[0]
        name = email[:email.find("@")]
        print(email,name)
    except Exception as e:
        print(e)
        pass
    
print(email,name)
```


```python
cur_url = a.driver.current_url
a.get("https://www.coursera.org/?authMode=signup")
for i in range(5):
    try:
        a.driver.find_element_by_xpath("//*[@id='name']").send_keys(name)
        a.driver.find_element_by_xpath("//*[@id='email']").send_keys(email)
        a.driver.find_element_by_xpath("//*[@id='password']").send_keys(email)
        a.driver.find_element_by_xpath("//button[@data-e2e='signup-form-submit-button']").click()
        break
    except Exception as e:
        print(e)
        pass
for i in range(5):
    try:
        a.driver.switch_to.frame(a.driver.find_element_by_xpath("//iframe[@title='recaptcha challenge expires in two minutes']"))
        a.driver.find_element_by_xpath("//div[@class='button-holder help-button-holder']").click()
        a.driver.switch_to.default_content()
        a.driver.find_element_by_xpath("//button[@class='primary finaid-submit-bttn']").click()    
        break
    except Exception as e:
        print(e)
        pass

while a.driver.current_url == cur_url:
    print("Waiting...")
    Working_scrapeClass.time.sleep(2)
a.get("https://www.coursera.org")
Working_scrapeClass.time.sleep(2)
```


```python
a.get("https://www.coursera.org/for-university-and-college-students")
a.driver.find_element_by_xpath("//*[@id='university-email-input-input']").send_keys(email)
a.driver.find_element_by_xpath('//button[@data-e2e="start-button"]/span').click()
for i in range(10):
    try:
        a.driver.find_element_by_xpath("//div[@class='container']//button").click()
        break
    except Exception as e:
        print(e)
        Working_scrapeClass.time.sleep(2)
        
for i in range(10):
    try:
        a.driver.find_element_by_xpath("//div[@class='container']//div[@class='button-container']/button").click()        
        break
    except Exception as e:
        print(e)

import pyperclip
pyperclip.copy(email)
a.alert()
```


```python
# Comfirm email first
# import pyperclip
# email = pyperclip.paste()

a.get("https://www.coursera.org/for-university-and-college-students")
a.driver.find_element_by_xpath("//*[@id='university-email-input-input']").send_keys(email)
a.driver.find_element_by_xpath('//button[@data-e2e="start-button"]/span').click()
for i in range(3):
    try:
        a.driver.find_element_by_xpath("//div[@class='container']//button").click()
        break
    except:
        Working_scrapeClass.time.sleep(2)

for i in range(3):
    try:
        a.driver.find_element_by_xpath("//div[@class='container']//button").click()
#         a.driver.find_element_by_xpath("//*[@id='rendered-content']/div/div/div[2]/div[4]/div/div[3]/div[2]/div/div/div[3]/button/span").click()        
        break
    except:
        Working_scrapeClass.time.sleep(2)        

for i in range(3):
    try:
        a.driver.find_element_by_xpath('//button[@data-track-component="accept_invitation"]').click()
        break
    except:
        Working_scrapeClass.time.sleep(2)        
```

# Coursera Login


```python
import pandas as pd
import numpy as np
import Working_scrapeClass
from time import sleep

a = Working_scrapeClass.scrapeSelenium()
a.initializeDriver(headless=False,without_image=False)
i = 1

URL = "https://www.coursera.org/?authMode=login"
BASE = URL[:URL.find('/',9)]
a.setupReCaptcha()

a.get(URL)


import pyperclip
for i in range(5):
    try:
        a.driver.find_element_by_xpath("//*[@id='email']").clear()
        a.driver.find_element_by_xpath("//*[@id='email']").clear()
        a.driver.find_element_by_xpath("//*[@id='email']").send_keys(pyperclip.paste())
        a.driver.find_element_by_xpath("//*[@id='password']").send_keys(pyperclip.paste())
        a.driver.find_element_by_xpath("/html/body/div[11]/div/div/section/section/div[1]/form/button").click()
        break
    except Exception as e:
        print(e)
        sleep(2)

        
        

```

    chrome-extension://mpbjkejclgfgadiemmefgebjfooflfhl/src/options/index.html
    Refreshed Tree.
    
    https://www.coursera.org/?authMode=login
    Refreshed Tree.
    
    Message: no such element: Unable to locate element: {"method":"xpath","selector":"/html/body/div[11]/div/div/section/section/div[1]/form/button"}
      (Session info: chrome=98.0.4758.102)
    
    Message: no such element: Unable to locate element: {"method":"xpath","selector":"/html/body/div[11]/div/div/section/section/div[1]/form/button"}
      (Session info: chrome=98.0.4758.102)
    
    Message: no such element: Unable to locate element: {"method":"xpath","selector":"/html/body/div[11]/div/div/section/section/div[1]/form/button"}
      (Session info: chrome=98.0.4758.102)
    
    Message: no such element: Unable to locate element: {"method":"xpath","selector":"/html/body/div[11]/div/div/section/section/div[1]/form/button"}
      (Session info: chrome=98.0.4758.102)
    
    Message: no such element: Unable to locate element: {"method":"xpath","selector":"/html/body/div[11]/div/div/section/section/div[1]/form/button"}
      (Session info: chrome=98.0.4758.102)
    
    


```python
for i in range(5):
    try:
        a.driver.switch_to.frame(a.driver.find_element_by_xpath("//iframe[@title='recaptcha challenge expires in two minutes']"))
        a.driver.find_element_by_xpath("//div[@class='button-holder help-button-holder']").click()
        a.driver.switch_to.default_content()
        a.driver.find_element_by_xpath("//button[@class='primary finaid-submit-bttn']").click()    
        break
    except Exception as e:
        print(e)
        pass

```

    Message: no such element: Unable to locate element: {"method":"xpath","selector":"//button[@class='primary finaid-submit-bttn']"}
      (Session info: chrome=98.0.4758.102)
    
    Message: no such element: Unable to locate element: {"method":"xpath","selector":"//button[@class='primary finaid-submit-bttn']"}
      (Session info: chrome=98.0.4758.102)
    
    Message: no such element: Unable to locate element: {"method":"xpath","selector":"//button[@class='primary finaid-submit-bttn']"}
      (Session info: chrome=98.0.4758.102)
    
    Message: no such element: Unable to locate element: {"method":"xpath","selector":"//button[@class='primary finaid-submit-bttn']"}
      (Session info: chrome=98.0.4758.102)
    
    Message: no such element: Unable to locate element: {"method":"xpath","selector":"//button[@class='primary finaid-submit-bttn']"}
      (Session info: chrome=98.0.4758.102)
    
    

# CareerJet


```python
import pandas as pd
import numpy as np
import Working_scrapeClass
from time import sleep

a = Working_scrapeClass.scrapeSelenium()
a.initializeDriver(headless=False,without_image=False)
i = 1

URL = "https://www.careerjet.com.my/internship-in-database-jobs.html"
BASE = URL[:URL.find('/',9)]
a.setupReCaptcha()

a.get(URL)
```


```python
a.scrollToEnd()
a.refreshTree()
data = []
data.append([BASE + x for x in a.tree.xpath("//header/h2/a/@href")])
data.append([x.strip() for x in a.tree.xpath("//header/h2/a/text()")])
data.append([x.strip() for x in a.tree.xpath("//div[@class='desc']/text()")])
data.append([x.strip() for x in a.tree.xpath("//ul[@class='tags']/li[1]/span[1]/text()[1]")])
pd.DataFrame(np.array(data).T)
```

# Paperswithcode


```python
import pandas as pd
import numpy as np
import Working_scrapeClass
from time import sleep

a = Working_scrapeClass.scrapeSelenium()
a.initializeDriver(headless=False,without_image=False)
i = 1

URL = "https://paperswithcode.com/search?q_meta=&q_type=&q=dataset"
BASE = URL[:URL.find('/',9)]
a.setupReCaptcha()

a.get(URL)
```


```python
a.scrollToEnd()
```


```python
import re
arrs = []
for item in a.tree.xpath("//div[@class='col-lg-9 item-content']"):
    arr = []
    arr.append(item.xpath("./h1/a/text()")[0])
    arr.append(BASE + item.xpath("./h1/a/@href")[0])
    arr.append(item.xpath("./p[@class='author-section']/a/text()")[0])
    try:
        arr.append(re.search("(\d+)",item.xpath(".//span[@class='item-conference-link']/a/text()")[0].strip()).group(1))
    except:
        try:
            arr.append(re.search("(\d{4})",item.xpath(".//span[@class='author-name-text item-date-pub']/text()")[0].strip()).group(1))
        except:
            arr.append("No date")
    arrs.append(arr)
pd.DataFrame(np.array(arrs)).to_clipboard()
```


```python

```


```python

```


```python

```


```python

```


```python

```


```python

```


```python

```


```python

```

# Coursera


```python
import pandas as pd
import numpy as np
import Working_scrapeClass
from time import sleep

a = Working_scrapeClass.scrapeSelenium()
a.initializeDriver(headless=False,without_image=False)
i = 1

URL = "https://www.coursera.org/specializations/aml"
BASE = URL[:URL.find('/',9)]
a.setupReCaptcha()

a.get(URL)

from json import dumps,load,loads
a.driver.delete_all_cookies()
with open('COOKIE_COURSERA.txt','r') as cookief:
# with open('COOKIE_COURSERA_Kelvin.txt','r') as cookief:
    cookieslist = load(cookief)
    for cookie in cookieslist:
        a.driver.add_cookie(cookie)

a.get(URL)

```


```python
from json import dumps,load,loads
with open('COOKIE_COURSERA.txt','w') as cookief:
# with open('COOKIE_COURSERA_Kelvin.txt','w') as cookief:
    cookief.write(dumps(a.driver.get_cookies()))
```


```python
a.scrollToEnd()
a.refreshTree()
URLS = [URL[0:URL.find("/",9)] + x for x in a.tree.xpath("//body/div[3]/div/div/main/div/div[6]/div/div/div[2]/div/div[3]/a/@href")]
print(URLS)

for i in range(len(URLS)):
# for i in range(3,5):
    a.get(URLS[i])
    a.refreshTree()
    text = a.tree.xpath("//h1[@class='banner-title banner-title-without--subtitle m-b-0']/text()")[0]
    try:
        a.driver.find_element_by_xpath("//button[@class='button-link finaid-link']").click()
        a.driver.find_element_by_xpath("//button[@class='button-link body-1-text']").click()
        Working_scrapeClass.time.sleep(Working_scrapeClass.randint(5,9))
        a.driver.find_element_by_xpath("//input[@id='info_checkbox']").click()
        a.driver.find_element_by_xpath("//input[@id='completion_checkbox']").click()

        a.driver.find_element_by_xpath("//input[@id='accept-terms-field']").send_keys("I agree to the terms above")
        a.driver.find_element_by_xpath("//div[@class='continue-button-container vertical-box align-items-absolute-center']").click()
        Working_scrapeClass.time.sleep(Working_scrapeClass.randint(3,7))

        from selenium.webdriver.support.ui import Select
        Select(a.driver.find_element_by_xpath("//select[@id='finaid-educationalBackground']")).select_by_visible_text('College degree')
        a.driver.find_element_by_xpath("//input[@id='finaid-income']").send_keys("0")
        Select(a.driver.find_element_by_xpath("//select[@id='finaid-employmentStatus']")).select_by_visible_text('Student')
        a.driver.find_element_by_xpath("//input[@id='finaid-amount-can-pay']").send_keys(0)
        a.driver.find_element_by_xpath("//input[@id='would-not-take-loan']").click()        
        
        a.driver.find_element_by_xpath("//textarea[@id='finaid-reason']").send_keys("I am a student from Malaysia and currently studying in Macau with CGPA 3.8 with a full scholarship. Unfortunately, any sort of Internship and part-time by a foreign student is illegal here at Macau so I could not attain any sort of income. There are some limited student helper positions in the university that are legal and I had applied and had been accepted to work for them. However, there is a working hour limit of 72 hours per month and I always max out the limit. The living cost in Macau is very high so almost all of my income is used to pay rent, food, and utilities. I intended to complete the whole course for later application for Master in Georgia Tech after my Bachelor Degree. One of my parents had retired and the other one is low income especially during the pandemic. In a developing country, I totally understand and respect the cost of preparing a course and am willing to pay for the copyright and work but the price is just too high for me. I would be very grateful if I could get financial assistance offered by coursera to register for the course and get a certificate for the program.")        
        a.driver.find_element_by_xpath("//textarea[@id='finaid-goal']").send_keys("I am currently a math degree student minor in Data Science and would like to become a Data Scientist in the future. Due to my current household financial status, I decided to start working after my Bachelor's Degree and pursue my Master's Degree at the same time. After weeks of searching through the internet, I decided to enroll in the Georgia Tech Online Master in Computer Science program, which is the cheapest program from a reputable university. However the course design in my university for Data Science is heavily math-based, therefore I decided to enroll in high-level courses about data science online to strengthen my CS background. I am preparing myself for a Master in Computer Science at Georgia Tech with a specialization in Data Science and this course will help for applying for the program. There are some courses offered in my current university but due to the school's policy, I am not eligible to enroll in any of them. Therefore, I would like to enroll in this course and I firmly believe enrolling in this course will help in both my career and my application. I am also applying for some freelance jobs online as part-time working is illegal and having this course on my resume will help in my career, which will enable me to purchase other courses on coursera.")
        a.driver.find_element_by_xpath("//textarea[@id='finaid-loanReason']").send_keys("One of my parents had retired and the other one is low income especially during the pandemic. I am very serious about my financial status and I do not think it will be a good idea to take a loan even with low-interest as it would be spending my future income, which is quite risky for a student who have not graduated from college and get a job yet.")

#         a.driver.find_element_by_xpath("//textarea[@id='finaid-reason']").send_keys("My name is Kelvin from Malaysia, pursurying Bachelor of Statistic in China. Unfortunately, my visa does not allow me to conduct any type  of Internship and part-time here so I could not attain any sort of income. I worked as student helper in school but there is a limit on working hours so I could not work enough. My earnings can barely supply myself here to avoid asking money from my family. I intended to complete the whole course for later application for a master in Computer Science after my degree. However, since I am a Statistic student, having some knowledge in CS field will definitely help in my further career as I intended to pursue a master in Data Science. As student from a developing country, I totally understand the cost to prepare a course and respect the copyright of author but the price range is out of my league. I would be very grateful if I could get financial assistance from coursera to register for the course and get a certificate for the program.")
#         a.driver.find_element_by_xpath("//textarea[@id='finaid-goal']").send_keys("As I am studying Statistic, I realize that pure statistic may not be an ideal path for me as the job market in Malaysia mostly require some CS background and Data Science. My knowledge in Math allows me to understand Machine Learning courses easier and me myself do have a strong interest in Machine Learning and Deep Learning. My major does include some basic CS courses like Introduction to Python, Applied Statistics with R and Linear Model with R, but none of them are really specifically designed for CS. After weeks of searching on the internet, I decided to further pursue a Data Science Master in future. The policy in my school only allows Science student to take arts or humanities minor, therefore I have to learn CS courses myself. I found out Coursera having a really good reputation in such area, and decided to take some Machine Learning and Deep Learning course on Coursera. If I have a stable job after graduation I would definately purchase other courses on coursera.")
#         a.driver.find_element_by_xpath("//textarea[@id='finaid-loanReason']").send_keys("As the pandamic situation in Malaysia in getting far worse than before, my family are undegoing a really hard time for paying daily expenses. I am afraid taking a loan now would be a risky move for me as I am still studying and there is a risk that I can't repay the loan. I will definetely consider a loan or even pay by myself once I graduated and have stable income.")
        
        a.driver.switch_to.frame(a.driver.find_element_by_xpath("//iframe[@title='recaptcha challenge expires in two minutes']"))
        a.driver.find_element_by_xpath("//div[@class='button-holder help-button-holder']").click()
        a.driver.switch_to.default_content()
        a.driver.find_element_by_xpath("//button[@class='primary finaid-submit-bttn']").click()    
        



        print(f"{i+1} / {len(URLS)} Done!")
        Working_scrapeClass.time.sleep(Working_scrapeClass.randint(1,5))
    except Exception as e:
        print(e)
        print("============================================= Failed =============================================")
        print(URLS[i])
        print(text)
        print("============================================= Failed =============================================")
```


```python
# Case 2
a.driver.find_element_by_xpath("//div[3]/div/div/div/div[1]/div/div/div/div[1]/div[5]/div/div/div").click()
a.driver.find_elements_by_xpath("//div[@class='cds-selectOption-container']")[2].click()
a.driver.find_element_by_xpath("//body/div[3]/div/div/div/div[1]/div/div/div/div[1]/div[9]/div/div/label/span/span").click()
a.driver.find_element_by_xpath("//body/div[3]/div/div/div/div[1]/div/div/div/div[1]/div[10]/button/span").click()
```


```python
a.driver.find_element_by_xpath("//body/div[3]/div/div/div/div[1]/div/div/div/form/div[5]/div/div[1]/div/div/input").send_keys('\b\b\b')
a.driver.find_element_by_xpath("//body/div[3]/div/div/div/div[1]/div/div/div/form/div[5]/div/div[1]/div/div/input").send_keys(0)
a.refreshTree()

```


```python
# while a.tree.xpath("//body/div[3]/div/div/div/div[1]/div/div/div/form/div[5]/div/div[1]/div/div/input/@value")[0] != '0':
#     a.driver.find_element_by_xpath("//body/div[3]/div/div/div/div[1]/div/div/div/form/div[5]/div/div[1]/div/div/input").clear()
#     a.driver.find_element_by_xpath("//body/div[3]/div/div/div/div[1]/div/div/div/form/div[5]/div/div[1]/div/div/input").clear()
#     Working_scrapeClass.time.sleep(1)
#     a.driver.find_element_by_xpath("//body/div[3]/div/div/div/div[1]/div/div/div/form/div[5]/div/div[1]/div/div/input").send_keys(0)
#     a.refreshTree()
a.driver.find_element_by_xpath("//body/div[3]/div/div/div/div[1]/div/div/div/form/div[6]/div/div[2]/textarea[1]").send_keys("I am currently a math degree student minor in Data Science and would like to become a Data Scientist in the future. Due to my current household financial status, I decided to start working after my Bachelor's Degree and pursue my Master's Degree at the same time. After weeks of searching through the internet, I decided to enroll in the Georgia Tech Online Master in Computer Science program, which is the cheapest program from a reputable university. However the course design in my university for Data Science is heavily math-based, therefore I decided to enroll in high-level courses about data science online to strengthen my CS background. I am preparing myself for a Master in Computer Science at Georgia Tech with a specialization in Data Science and this course will help for applying for the program. There are some courses offered in my current university but due to the school's policy, I am not eligible to enroll in any of them. Therefore, I would like to enroll in this course and I firmly believe enrolling in this course will help in both my career and my application. I am also applying for some freelance jobs online as part-time working is illegal and having this course on my resume will help in my career, which will enable me to purchase other courses on coursera.")
a.driver.find_element_by_xpath("/html/body/div[3]/div/div/div/div[1]/div/div/div/form/div[7]/div[1]/div/div/label/span/span/input").click()
a.driver.find_element_by_xpath("/html/body/div[3]/div/div/div/div[1]/div/div/div/form/div[7]/div[2]/div/div/label/span/span/input").click()
a.driver.find_element_by_xpath("/html/body/div[3]/div/div/div/div[1]/div/div/div/form/div[9]/div/div[2]/input").send_keys("I agree to the terms above")

a.driver.switch_to.frame(a.driver.find_element_by_xpath("//iframe[@title='reCAPTCHA']"))
a.driver.find_element_by_xpath("//div[@class='recaptcha-checkbox-border']").click()
a.driver.switch_to.default_content()
Working_scrapeClass.time.sleep(2)
a.driver.find_element_by_xpath("//*[@id='rendered-content']/div/div/div/div[1]/div/div/div/form/div[11]/button/span").click()
a.driver.find_element_by_xpath("/html/body/div[3]/div/div/div/div[1]/div/div/div/div[4]/div[10]/button/span").click()

```

<?php include 'footer.php';?>
