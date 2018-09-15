import os
from ckanapi import RemoteCKAN


# # ckan api access
# !pip install ckanapi
# from ckanapi import RemoteCKAN
# ua = 'hackathon/1.0 (+https://datafizz.com)'
# europa = RemoteCKAN('http://data.europa.eu/euodp/data', user_agent=ua)
# groups = europa.action.group_list(id='data-explorer')
# print(groups)

class Opendata:
    current = ""
    user_agent = 'hackathon/1.0 (+https://data-fizz.com)'

    def __init__(self, uri = 'http://data.europa.eu/euodp/data'):
        self.current = uri
        pass

    def groups(self):
        return self.europa().group_list(id='data-explorer')

    def europa(self):
        europa = RemoteCKAN(self.current, user_agent=self.user_agent)
        return europa.action
