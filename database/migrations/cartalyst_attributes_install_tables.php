@@ -0,0 +1,72 @@
+<?php
+


+
+use Illuminate\Database\Migrations\Migration;
+
+class MigrationCartalystAttributesInstallTables extends Migration
+{
+ 
+    public function up()
+    {
+        Schema::create('attributes', function ($table) {
+            $table->increments('id');
+            $table->string('slug');
+            $table->timestamps();
+
+            $table->unique('slug');
+
+            // We'll need to ensure that MySQL uses the InnoDB engine to
+            // support the indexes, other engines aren't affected.
+            $table->engine = 'InnoDB';
+            $table->index('slug');
+        });
+
+        Schema::create('attribute_values', function ($table) {
+            $table->increments('id');
+            $table->integer('attribute_id')->unsigned();
+            $table->string('entity_type');
+            $table->integer('entity_id')->unsigned();
+            $table->mediumText('value');
+            $table->timestamps();
+
+            // We'll need to ensure that MySQL uses the InnoDB engine to
+            // support the indexes, other engines aren't affected.
+            $table->engine = 'InnoDB';
+            $table->index('attribute_id');
+            $table->index('entity_type');
+            $table->index('entity_id');
+        });
+    }
+
+  
+     * Reverse the migrations.
+     *
+     * @return void
+     */
+    public function down()
+    {
+        Schema::drop('attributes');
+        Schema::drop('attribute_values');
+    }
+}