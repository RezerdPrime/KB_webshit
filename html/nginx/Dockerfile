FROM nginx:latest

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    wget \
    unzip \
    git \
    build-essential \
    libpcre3-dev \
    zlib1g-dev \
    libssl-dev

# Скачиваем и устанавливаем OpenAppSec
RUN wget https://github.com/openappsec/open-appsec/releases/latest/download/open-appsec-nginx-module.zip -O /tmp/open-appsec.zip && \
    unzip /tmp/open-appsec.zip -d /tmp && \
    mv /tmp/open-appsec-nginx-module /etc/nginx/modules/open-appsec

# Пересобираем Nginx с модулем OpenAppSec
RUN cd /etc/nginx/modules/open-appsec && \
    ./configure --add-dynamic-module=./ && \
    make && make install

# Копируем конфигурацию OpenAppSec
COPY open-appsec.conf /etc/nginx/conf.d/open-appsec.conf
COPY nginx.conf /etc/nginx/nginx.conf
