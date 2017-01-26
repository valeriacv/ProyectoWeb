 -- Insertar Organización
USE ProyectoWeb;
INSERT INTO Organizacion(nombre,descripcion, mision, vision, valores, imagen)
VALUES ('Organización SFDL',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel leo laoreet, facilisis nisl nec, tincidunt tellus. Etiam dignissim lobortis fermentum. Curabitur sagittis lacus ipsum, sit amet posuere felis pellentesque eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur porttitor urna nec elit pretium sodales. Maecenas ultrices lacus justo, in mollis est varius vitae. Aliquam ac elit vel sapien scelerisque maximus in in justo. Aliquam consequat metus metus, eget mollis tellus condimentum quis.',
    'Nam ullamcorper volutpat mollis. Fusce molestie neque at quam consequat, posuere tincidunt leo fringilla. Etiam interdum turpis quis diam luctus ullamcorper. Duis ante risus, tempor sed vehicula et, volutpat et mi. Integer eu leo lectus. Aliquam semper urna justo, quis molestie urna feugiat ut. Maecenas hendrerit semper felis, posuere gravida neque laoreet ac. Donec sodales augue a velit lacinia rutrum et at nisl. Etiam vestibulum elementum nibh, euismod ultrices magna condimentum id.',
    'Donec quis ante eu quam sollicitudin tempus. Donec auctor convallis lacus, vitae egestas nunc convallis ut. Ut vulputate nec mauris non ullamcorper. Aliquam convallis condimentum arcu, id finibus arcu iaculis ac. Fusce ac aliquet mauris. Integer semper tellus nec venenatis condimentum. Proin accumsan mattis nisi, quis tincidunt augue lobortis non. Nulla eleifend nisi ut odio finibus efficitur.',
    'Nunc non lorem tempus diam elementum consectetur sed a urna. Proin neque enim, volutpat ut auctor eu, auctor at tortor. Integer et justo vel mi rutrum lobortis at ac lacus. Curabitur non enim non diam consectetur facilisis sit amet quis nulla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec convallis, turpis vel finibus facilisis, mauris est tempor libero, et volutpat arcu purus ut libero. Aenean imperdiet mollis odio eget tempus. Fusce et arcu maximus risus convallis euismod nec quis risus. Mauris consequat sagittis pharetra. Nam et mi tristique, maximus tortor ac, aliquam eros. Duis nulla tellus, egestas quis lectus quis, tempus pharetra felis. Suspendisse augue sapien, sagittis ut feugiat vel, consequat vel dolor. Vivamus placerat in tellus vitae condimentum. In consectetur sem et tellus viverra euismod. Cras interdum massa vitae nulla lacinia, eu tincidunt turpis porttitor. Phasellus at rutrum lectus, id viverra ipsum.',
    'imgPath'
);

-- Insertar Grupos de Trabajo
INSERT INTO GruposTrabajo(nombre, descripcion,Organizacion_id)
VALUES
('Grupo 1',
    'Donec quis ante eu quam sollicitudin tempus. Donec auctor convallis lacus, vitae egestas nunc convallis ut. Ut vulputate nec mauris non ullamcorper. Aliquam convallis condimentum arcu, id finibus arcu iaculis ac. Fusce ac aliquet mauris. Integer semper tellus nec venenatis condimentum. Proin accumsan mattis nisi, quis tincidunt augue lobortis non. Nulla eleifend nisi ut odio finibus efficitur.',
1),
('Grupo 2',
    'Donec quis ante eu quam sollicitudin tempus. Donec auctor convallis lacus, vitae egestas nunc convallis ut. Ut vulputate nec mauris non ullamcorper. Aliquam convallis condimentum arcu, id finibus arcu iaculis ac. Fusce ac aliquet mauris. Integer semper tellus nec venenatis condimentum. Proin accumsan mattis nisi, quis tincidunt augue lobortis non. Nulla eleifend nisi ut odio finibus efficitur.',
1),
('Grupo 3',
    'Donec quis ante eu quam sollicitudin tempus. Donec auctor convallis lacus, vitae egestas nunc convallis ut. Ut vulputate nec mauris non ullamcorper. Aliquam convallis condimentum arcu, id finibus arcu iaculis ac. Fusce ac aliquet mauris. Integer semper tellus nec venenatis condimentum. Proin accumsan mattis nisi, quis tincidunt augue lobortis non. Nulla eleifend nisi ut odio finibus efficitur.',
1),
 ('Grupo 4',
    'Donec quis ante eu quam sollicitudin tempus. Donec auctor convallis lacus, vitae egestas nunc convallis ut. Ut vulputate nec mauris non ullamcorper. Aliquam convallis condimentum arcu, id finibus arcu iaculis ac. Fusce ac aliquet mauris. Integer semper tellus nec venenatis condimentum. Proin accumsan mattis nisi, quis tincidunt augue lobortis non. Nulla eleifend nisi ut odio finibus efficitur.',
1);

-- Insertar Admin User
INSERT INTO Usuarios(usuario,nombre,primer_apellido,segundo_apellido,contrasenia,esAdmin)
VALUES ('admin', 'Admin', 'Admin', 'Admin','admin123',1);


