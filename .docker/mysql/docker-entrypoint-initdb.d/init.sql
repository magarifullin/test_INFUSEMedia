create table views_counter
(
    ip_address  varchar(15)                         not null comment 'IP address of the visitor',
    user_agent  varchar(256)                        not null comment 'Their user-agent',
    page_url    varchar(256)                        not null comment 'URL of the page where the image was loaded',
    view_date   timestamp default CURRENT_TIMESTAMP not null comment 'The date and time the image was shown for this visitor',
    views_count int       default 1                 not null comment 'Number of image loads for the same visitor',
    constraint views_counter_ip_address_user_agent_page_url_uindex
        unique (ip_address, user_agent, page_url)
)
    comment 'visitor''s info';


