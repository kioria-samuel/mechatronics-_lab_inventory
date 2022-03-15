from django.shortcuts import render
from django.views.generic import TemplateView

class Home(TemplateView):
    template_name = 'basic_template.html'

class Borrow(TemplateView):
    template_name = 'borrow.html'

class Return(TemplateView):
    template_name = 'return.html'

class Identify(TemplateView):
    template_name = 'identify.html'

class Home(TemplateView):
    template_name = 'basic_template.html'

class Home(TemplateView):
    template_name = 'basic_template.html'
