from django.contrib import admin
from django.urls import path, include
from core.settings import DEBUG

from django.conf import settings
from django.conf.urls.static import static

from main.views import *



urlpatterns = [
    path('admin/', admin.site.urls),
    path('accounts/', include('allauth.urls')),

    # 3rd party apps
    path('', Home.as_view(), name='home'),
    path('borrow/', Borrow.as_view(), name='borrow'),
    path('return/', Return.as_view(), name='return'),
    path('identify/', Identify.as_view(), name='identify'),
]

if settings.DEBUG:
    urlpatterns += static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)
