from django.contrib import admin
from django.urls import path, include

from main.views import Home

urlpatterns = [
    path('admin/', admin.site.urls),
    path('accounts/', include('allauth.urls')),

    # 3rd party apps
    path('', Home.as_view(), name='home'),
]
