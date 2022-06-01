cd public
cls
@ECHO off
ECHO  #####   #                          #           #     ######    #####  
ECHO #     #  #                          #           #     #     #     #    
ECHO #        #   ##   #     #  # ####   #   ##     ###    #     #     #    
ECHO  #####   #  #     #     #  ##    #  #  #       # #    ######      #    
ECHO       #  ###      #     #  #     #  ###       #####   #           #    
ECHO #     #  #  #     #    ##  #     #  #  #      #   #   #           #    
ECHO  #####   #   ##    #### #  #     #  #   ##   ##   ##  #         ##### 
ECHO .

IF /I "%1" == "domain" (
    IF /I "%2" == "" (
        ECHO Apos digitar o parametro "domain" digite o dominio e a porta. Exemplo: "start run domain localhost:8100"
    ) ELSE (
        php -S %2
    )
) ELSE (
    IF /I "%1" == "port" (
        IF /I "%2" == "" (
            ECHO Apos digitar o parametro "port" digite a porta. Exemplo: "start run port 8100"
        ) ELSE (
            php -S 127.0.0.1:%2
        )
    ) ELSE (
        IF /I "%1" == "" (
            php -S 127.0.0.1:8100
        ) ELSE (
            ECHO Se inserir o parametro "domain" e executado no dominio e porta definida. Exemplo: "start run domain localhost:8100"
            ECHO Se inserir o parametro "port" o localhost executa com a porta definida. Exemplo: "start run port 8100"
        )
    )
)